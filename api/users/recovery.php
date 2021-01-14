<?php
require('../../src/inc/pdo.php');
require('../../src/inc/functions.php');
$errors = [];
$success = false;

session_start();
error_reporting(0);

$password = checkXss($_POST['password']);
$passwordConfirm = checkXss($_POST['password-confirm']);

$errors = checkField($errors, $password, 'password', 6, 200);
$errors = checkField($errors, $passwordConfirm, 'password-confirm', 6, 200);

if ($password != $passwordConfirm) $errors['password-confirm'] == 'Les mots de passes ne sont pas identiques';

if (count($errors) == 0) {
    $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
    $token = generateRandomString(200);

    update($pdo, 'nr_users', [
        'password = "' . $passwordHashed . '"',
        'token = "' . $token . '"'
    ], 'id', $user['id']);
    $user = select($pdo, 'nr_users', '*', 'id', $user['id']);
    $success = true;
}

$data = [
    'errors' => $errors,
    'success' => $success
];

showJson($data);
