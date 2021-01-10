<?php
require('../../src/inc/pdo.php');
require('../../src/inc/functions.php');
$errors = [];
$success = false;

session_start();
error_reporting(0);

$_SESSION['netron']['user'] = [];
$success = true;

$data = [
    'errors' => $errors,
    'success' => $success
];

showJson($data);
