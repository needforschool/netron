<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?> - Netron</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/errors.css">
</head>

<body>
    <?php if ($title == 'Accueil') : ?>
        <style>
            #header .navbar .nav .nav-item .nav-link {
                color: var(--white);
            }

            #header .navbar .btn.btn-blue-primary {
                color: var(--white);
                background-color: rgba(255, 255, 255, .2);
            }

            #header .navbar .btn.btn-blue-primary:hover {
                opacity: initial;
                background-color: rgba(255, 255, 255, .4);
            }
        </style>
    <?php endif; ?>
    <div class="grid-wrapper">
        <div class="container grid">
            <div class="grid-line"></div>
            <div class="grid-line"></div>
            <div class="grid-line"></div>
            <div class="grid-line"></div>
            <div class="grid-line"></div>
        </div>
    </div>
    <header id="header">
        <nav class="navbar">
            <div class="container">
                <a href="./"><img class="nav-logo" src="<?= ($title == 'Accueil') ? './assets/img/logo/logo-white-bg-none.png' : './assets/img/logo/logo-blue-bg-none.png' ?>" alt="Logo Netron"></a>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="./about.php">Qui sommes nous</a></li>
                    <li class="nav-item"><a class="nav-link" href="./contact.php">Contact</a></li>
                </ul>
                <button <?= (isLogged()) ? 'role="btn-dashboard"' : 'role="btn-modal-login"' ?> class="nav-item btn btn-blue-primary"><?= (isLogged()) ? 'Tableau de bord' : 'Se connecter' ?>
                    <svg class="btn-arrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                        <g fill-rule="evenodd">
                            <path class="btn-arrow-line" d="M0 5h7"></path>
                            <path class="btn-arrow-tip" d="M1 1l4 4-4 4"></path>
                        </g>
                    </svg>
                </button>
                <div class="nav-burger">
                    <img class="nav-burger-img" src="./assets/img/menu-line.svg" alt="Burger">
                </div>
                <ul class="nav-responsive">
                    <li class="nav-item"><a class="nav-link" href="./">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="./about.php">Qui sommes nous</a></li>
                    <li class="nav-item"><a class="nav-link" href="./contact.php">Contact</a></li>
                    <button <?= (isLogged()) ? 'role="btn-dashboard"' : 'role="btn-modal-login"' ?> class="nav-item btn btn-white" href="#"><?= (isLogged()) ? 'Tableau de bord' : 'Se connecter' ?>
                        <svg class="btn-arrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                            <g fill-rule="evenodd">
                                <path class="btn-arrow-line" d="M0 5h7"></path>
                                <path class="btn-arrow-tip" d="M1 1l4 4-4 4"></path>
                            </g>
                        </svg>
                    </button>
                </ul>
            </div>
        </nav>
        <div class="modal-wrapper">
            <div class="modal-content">
                <i class="modal-close ri-close-line"></i>
                <form class="form-login" action="./api/users/login.php" method="post">
                    <img class="form-image" src="./assets/img/security.svg" alt="Security">
                    <input type="email" name="mail" placeholder="Votre email" value="">
                    <input type="password" name="password" placeholder="Votre mot de passe" value="">
                    <button type="submit" class="btn btn-blue-primary">Se connecter
                        <svg class="btn-arrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                            <g fill-rule="evenodd">
                                <path class="btn-arrow-line" d="M0 5h7"></path>
                                <path class="btn-arrow-tip" d="M1 1l4 4-4 4"></path>
                            </g>
                        </svg>
                    </button>
                    <a href="./forgot_password.php" class="forgot-password">Mot de passe oublié</a>
                    <button role="btn-register" class="btn btn-blue-primary">S'inscrire
                        <svg class="btn-arrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                            <g fill-rule="evenodd">
                                <path class="btn-arrow-line" d="M0 5h7"></path>
                                <path class="btn-arrow-tip" d="M1 1l4 4-4 4"></path>
                            </g>
                        </svg>
                    </button>
                </form>
                <form class="form-register" action="./api/users/register.php" method="post">
                    <img class="form-image" src="./assets/img/undraw_sign_in_e6hj.svg" alt="Register">
                    <div class="inputs-container">
                        <input type="text" name="lastname" placeholder="Votre nom" value="">
                        <input type="text" name="firstname" placeholder="Votre prénom" value="">
                    </div>
                    <input type="email" name="mail" placeholder="Votre email" value="">
                    <div class="inputs-container">
                        <input type="password" name="password" placeholder="Votre mot de passe" value="">
                        <input type="password" name="password-confirm" placeholder="Confirmation du mot de passe" value="">
                    </div>
                    <button type="submit" class="btn btn-blue-primary">S'inscrire
                        <svg class="btn-arrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                            <g fill-rule="evenodd">
                                <path class="btn-arrow-line" d="M0 5h7"></path>
                                <path class="btn-arrow-tip" d="M1 1l4 4-4 4"></path>
                            </g>
                        </svg>
                    </button>
                    <p>Vous possédez déjà un compte ?</p>
                    <button role="btn-login" class="btn btn-blue-primary">Se connecter
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
    </header>