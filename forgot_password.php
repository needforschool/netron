<?php
require('./src/inc/functions.php');
$title = 'Mot de passe oublie';
include('./src/template/header.php');
?>

<section id="forgot_password">
    <div class="container">
        <div class="forgot-container">
            <form class="form-forgot" action="./api/users/forgot_password.php" method="POST">
                <input type="email" name="mail" placeholder="Votre email"
                    value="<?= (!empty($_SESSION['netron']['user']['mail'])) ? $_SESSION['netron']['user']['mail'] : '' ?>">
                <button type="submit" name="submit" class="btn btn-blue-primary">Envoyer
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