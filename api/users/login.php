<?php
require('../../src/inc/pdo.php');
require('../../src/inc/functions.php');
$errors = [];
$success = false;

session_start();
error_reporting(0);

$mail = checkXss($_POST['mail']);
$password = checkXss($_POST['password']);

$errors = checkEmail($errors, $mail, 'mail');
$errors = checkField($errors, $mail, 'mail', 6, 160);
$errors = checkField($errors, $password, 'password', 6, 200);

$user = select($pdo, 'nr_users', '*', 'mail', $mail);

if (empty($user)) $errors['mail'] = 'Cette email n\'est pas enregistrée pensez à vous inscrire.';


if (!password_verify($password, $user['password'])) $errors['password'] = 'Mot de passe incorrect';

if (count($errors) == 0) {
    if (!empty($user)) {
        $_SESSION['netron']['user'] = [
            'id'     => $user['id'],
            'mail' => $user['mail'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'role'   => $user['role'],
            'ip'     => $_SERVER['REMOTE_ADDR']
        ];
    }
    $success = true;
}

$data = [
    'errors' => $errors,
    'success' => $success
];

showJson($data);
