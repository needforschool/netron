<?php
require('src/inc/functions.php');
$error = 404;
if (!empty($_GET['e']) && is_numeric($_GET['e']) && $_GET['e'] >= 400 && $_GET['e'] <= 527) $error = $_GET['e'];
$message;
switch ($error) {
    case 403:
        $message = 'Accès refusé';
        break;
    case 400:
        $message = 'Syntaxe erronnée';
        break;
    default:
        $message = 'Ressource non trouvée';
        break;
}
$title = ' Erreur ' . $error . ' - Netron';
include('src/template/header.php');
?>
<section id="error">
    <div class="container container-error">
        <div class="error-text">
            <h1 class="error-txt"><?= $error ?></h1>
            <p class="error-txt"><?= $message ?></p>
        </div>
        <?php if ($error == 404) {
             ?>  <div class="error-image">
                    <img class="error-img" src="assets/img/error_404.svg" alt="erreur">
                 </div><?php
            } else {
             ?>  <div class="error-image">
                    <img class="error-img" src="assets/img/undraw_warning.svg" alt="erreur">
                 </div><?php
            }?>
    </div>
</section>
<?php
include('src/template/footer.php');
