<?php
require('../../src/inc/pdo.php');
require('../../src/inc/functions.php');
$errors = [];
$success = false;

session_start();
error_reporting(0);

// code here...

$data = [
    'errors' => $errors,
    'success' => $success
];

showJson($data);
