<?php
require('../../src/inc/pdo.php');
require('../../src/inc/functions.php');

$errors = [];
$trames = [];
$success = false;

session_start();
error_reporting(0);

$logs = selectAll($pdo, 'nr_logs');

// Check if the user is logged in
if (!isLogged()) $errors['user'] = 'Vous devez être connnecté avant d\'effectuer cette action.';

if (count($errors) == 0) {
    foreach ($logs as $trame) {
        $items = json_decode($trame['data']);
        foreach ($items as $item) {
            $trames[] = $item;
        }
    }
    $success = true;
}

$data = [
    'errors' => $errors,
    'success' => $success,
    'trames' => $trames
];

showJson($data);
