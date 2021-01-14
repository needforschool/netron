 <?php
require('../../src/inc/pdo.php');
require('../../src/inc/functions.php');
$errors = [];
$success = false;

session_start();
error_reporting(0);

// Check if the user is logged in
if (!isLogged()) $errors['user'] = 'Vous devez être connnecté avant d\'effectuer cette action.';

$firstname = checkXss($_POST['firstname']);
$lastname = checkXss($_POST['lastname']);
$mail = checkXss($_POST['mail']);

$errors = checkField($errors, $firstname, 'firstname', 2, 80);
$errors = checkField($errors, $lastname, 'lastname', 2, 80);
$errors = checkEmail($errors, $mail, 'mail');
$errors = checkField($errors, $mail, 'mail', 6, 160);

if (count($errors) == 0) {
    $user = select($pdo, 'nr_users', '*', 'id', $_SESSION['netron']['user']['id']);

    $_SESSION['netron']['user'] = [
        'id'     => $user['id'],
        'mail' => $mail,
        'firstname' => $firstname,
        'lastname' => $lastname,
        'role'   => $user['role'],
        'ip'     => $_SERVER['REMOTE_ADDR']
    ];
    update($pdo, 'nr_users', [
        'mail = "' . $mail . '"',
        'firstname = "' . $firstname . '"',
        'lastname = "' . $lastname . '"',
        'updated_at = "' . now() . '"',
    ], 'id', $_SESSION['netron']['user']['id']);
    $success = true;
}

$data = [
    'errors' => $errors,
    'success' => $success
];

showJson($data);
