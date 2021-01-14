<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Symfony\Component\Dotenv\Dotenv;

require('../../src/inc/pdo.php');
require('../../src/inc/functions.php');
require('../../vendor/autoload.php');

$dotenv = new Dotenv();
$dotenv->load('../../.env');
$errors = [];
$success = false;

session_start();
error_reporting(0);

$mail  = checkXss($_POST['mail']);

$errors = checkEmail($errors, $mail, 'mail');
$user = select($pdo, 'nr_users', '*', 'mail', $mail);
if (empty($user)) $errors['mail'] = 'Email introuvable';
else {
    if (count($errors) == 0) {
        $currentLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $recoveryLink = str_replace(basename(__FILE__), '../../recovery.php', $currentLink);

        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";
        try {
            $mail->isSMTP();
            $mail->Host       = $_ENV['SMTP_HOST'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['SMTP_USERNAME'];
            $mail->Password   = $_ENV['SMTP_PASSWORD'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = $_ENV['SMTP_PORT'];

            $mail->setFrom('contact@onruntime.com', 'Rescue - Netron');
            $mail->addAddress($user['mail'], $user['firstname'] . ' ' . $user['lastname']);

            $mail->isHTML(true);
            $mail->Subject = 'Récupération de mot de passe';
            $mail->Body    = '<div style="text-align: center;"><h3>Récupération de mot de passe</h3><a href="' . $recoveryLink . '?mail=' . $user["mail"] . '&token=' . $user["token"] . '" style="color: #ff6b6b; text-decoration: none">Cliquez ici pour changez votre mot de passe</a></div>';
            $mail->AltBody = 'Cliquez sur le lien pour récupérer votre mot de passe: ' . $recoveryLink . '?mail=' . $user["mail"] . '&token=' . $user["token"];

            $mail->send();
            $success = true;
        } catch (Exception $e) {
            $errors['mailer'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

$data = [
    'errors' => $errors,
    'success' => $success
];

showJson($data);
