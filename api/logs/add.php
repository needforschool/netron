<?php
require('../../src/inc/pdo.php');
require('../../src/inc/functions.php');
$errors = [];
$success = false;

session_start();
error_reporting(0);

$file = file_get_contents('https://floriandoyen.fr/resources/frames.php');
$json = json_decode($file, true);
$types = ["date", "version", "headerLength", "service", "identification", "flags", "ttl", "protocol", "headerChecksum", "ip"];

// Check if each objects contain each types
for ($i = 0; $i < count($json); $i++) {
    $object = $json[$i];
    foreach ($types as $type) {
        if (empty($object[$type])) $errors[$type] = "L'objet $i ne contient pas de $type.";
    }
}

// Check if the user is logged in
if (!isLogged()) $errors['user'] = 'Vous devez être connnecté avant d\'effectuer cette action.';

if (count($errors) == 0) {
    insert(
        $pdo,
        'nr_logs',
        [
            'user_id',
            'data',
            'created_at',
            'updated_at'
        ],
        [
            $_SESSION['netron']['user']['id'],
            json_encode($json),
            now(),
            now()
        ]
    );
    $success = true;
}

$data = [
    'errors' => $errors,
    'success' => $success
];

showJson($data);
