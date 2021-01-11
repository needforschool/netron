<?php
require('./src/inc/functions.php');
$title = 'Contact';
include('./src/template/header.php');
?>
<section id="contact">
    <div class="container">
        <div class="contact-container">
            <form class="form-contact" action="./api/contact/add.php" method="post">
                <div class="inputs-container">
                    <input type="mail" name="mail" placeholder="Votre mail" value="<?= (!empty($_SESSION['netron']['user']['mail'])) ? $_SESSION['netron']['user']['mail'] : '' ?>">
                    <input type="text" name="firstname" placeholder="Votre prénom" value="<?= (!empty($_SESSION['netron']['user']['firstname'])) ? $_SESSION['netron']['user']['firstname'] : '' ?>">
                </div>
                <div class="inputs-container">
                    <input type="text" name="lastname" placeholder="Votre nom" value="<?= (!empty($_SESSION['netron']['user']['lastname'])) ? $_SESSION['netron']['user']['lastname'] : '' ?>">
                    <input type="text" name="subject" placeholder="Votre motif">
                </div>
                <textarea name="message" placeholder="Votre message"></textarea>

                <button type="submit" class="btn btn-blue-primary" role="btn-profile-save">Envoyer
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
<?php
include('./src/template/footer.php');
