<?php
require('../../src/inc/pdo.php');
require('../../src/inc/functions.php');
$errors = [];
$success = false;

session_start();
error_reporting(0);

$firstname = checkXss($_POST['firstname']);
$lastname = checkXss($_POST['lastname']);
$mail = checkXss($_POST['mail']);
$password = checkXss($_POST['password']);
$passwordConfirm = checkXss($_POST['password-confirm']);

$errors = checkField($errors, $firstname, 'firstname', 2, 80);
$errors = checkField($errors, $lastname, 'lastname', 2, 80);
$errors = checkEmail($errors, $mail, 'mail');
$errors = checkField($errors, $mail, 'mail', 6, 160);
$errors = checkField($errors, $password, 'password', 6, 200);
$errors = checkField($errors, $passwordConfirm, 'password-confirm', 6, 200);

if ($password != $passwordConfirm) $errors['password-confirm'] == 'Les mots de passes ne sont pas identiques';


$checkUsedEmail = select($pdo, 'nr_users', 'mail', 'mail', $mail);
if (!empty($checkUsedEmail)) $errors['mail'] = 'Cette adresse mail est déjà utilisée.';

if (count($errors) == 0) {
    $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
    $token = generateRandomString(200);
    insert(
        $pdo,
        'nr_users',
        [
            'mail',
            'password',
            'token',
            'firstname',
            'lastname',
            'created_at',
            'updated_at',
            'role'
        ],
        [
            $mail,
            $passwordHashed,
            $token,
            $firstname,
            $lastname,
            now(),
            now(),
            'user'
        ]
    );
    $user = select($pdo, 'nr_users', '*', 'mail', $mail);
    if (!empty($user)) {
        $_SESSION['netron']['user'] = [
            'id'     => $user['id'],
            'mail' => $user['mail'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'token'   => $user['token'],
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
