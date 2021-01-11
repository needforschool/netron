<?php
require('../../src/inc/pdo.php');
require('../../src/inc/functions.php');
$errors = [];
$success = false;

session_start();
error_reporting(0);

$mail = checkXss($_POST['mail']);
$firstname = checkXss($_POST['firstname']);
$lastname = checkXss($_POST['lastname']);
$subject = checkXss($_POST['subject']);
$message = checkXss($_POST['message']);

$errors = checkEmail($errors, $mail, 'mail');
$errors = checkField($errors, $mail, 'mail', 6, 160);
$errors = checkField($errors, $firstname, 'firstname', 2, 100);
$errors = checkField($errors, $lastname, 'lastname', 2, 100);
$errors = checkField($errors, $subject, 'subject', 10, 250);
$errors = checkField($errors, $message, 'message', 10, 2000);

if (count($errors) == 0) {
    insert($pdo, 'nr_contact', ['mail', 'firstname',  'lastname',  'subject', 'message', 'created_at'], [$mail, $firstname, $lastname, $subject, $message, now()]);
    $success = true;
}

$data = [
    'errors' => $errors,
    'success' => $success
];

showJson($data);
