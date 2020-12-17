<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?= $title ?> - Netron</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap">
</head>

<body>
    <?php if ($title == 'Accueil') : ?>
        <style>
            #header .navbar .nav .nav-item .nav-link {
                color: var(--white);
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
                <a class="btn btn-white" href="#">Connexion
                    <svg class="btn-arrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                        <g fill-rule="evenodd">
                            <path class="btn-arrow-line" d="M0 5h7"></path>
                            <path class="btn-arrow-tip" d="M1 1l4 4-4 4"></path>
                        </g>
                    </svg>
                </a>
            </div>
        </nav>
    </header>