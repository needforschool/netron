<?php
require('./src/inc/pdo.php');
require('./src/inc/functions.php');

if (!empty($_GET['mail']) && !empty($_GET['token']) && filter_var($_GET['mail'], FILTER_VALIDATE_EMAIL)) {
    $mail = checkXss($_GET['mail']);
    $token = checkXss($_GET['token']);

    $user = select($pdo, 'nr_users', '*', 'mail', $mail);
    if (empty($user) || $user['token'] != $token) {
        header('Location: ./error.php');
        die();
    }
} else {
    header('Location: ./error.php');
    die();
}

$title = 'Mot de passe oublié';
include('./src/template/header.php');
?>

<section id="recovery">
    <div class="container">
        <div class="recovery-container">
        <form class="form-recovery" action="./api/users/recovery.php" method="POST">
            <!-- <div class="inputs"> -->
                
                    <input type="password" name="password" placeholder="Nouveau mot de passe">
                    <input type="password" name="password-confirm" placeholder="Confirmation du mot de passe">
                
            <!-- </div> -->
            
            <button type="submit" name="submit" class="btn btn-blue-primary">Valider
                <svg class="btn-arrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                    <g fill-rule="evenodd">
                        <path class="btn-arrow-line" d="M0 5h7"></path>
                        <path class="btn-arrow-tip" d="M1 1l4 4-4 4"></path>
                    </g>
                </svg>
            </button>
        </form>
        </div>
        
    </div>
</section>

<?php include('./src/template/footer.php');
