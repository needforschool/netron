<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title><?= $title  ?> - Netron</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap">
</head>

<body>
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
        <nav class="navbar ">
            <div class="container">
                <a href="./"><img class="nav-logo" src="assets/img/logo/logo-white-bg-none.png" alt="Logo Netron"></a>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="#">Qui sommes nous</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
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
        <?php if($title == 'Accueil') : ?>
            <div class="background-rainbow"></div>
            <div class="layout container">
                
                 <div class="layout-text">
                    <h1 class="layout-text-title">Infrastructure spécialisée dans l’analyse réseau</h1>
                    <p class="layout-text-desc">Des millions d'entreprises de toutes tailles, des start-up aux grandes
                        entreprises, utilisent nos plateformes d’analyse réseau.</p>
                    <div class="layout-text-btn">
                        <a class="btn btn-blue-primary" href="#">Démarrer dès maintenant
                            <svg class="btn-arrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                                <g fill-rule="evenodd">
                                    <path class="btn-arrow-line" d="M0 5h7"></path>
                                    <path class="btn-arrow-tip" d="M1 1l4 4-4 4"></path>
                                </g>
                            </svg>
                        </a>
                        <a class="btn btn-transparent" href="#">Contacter notre équipe
                            <svg class="btn-arrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                                <g fill-rule="evenodd">
                                    <path class="btn-arrow-line" d="M0 5h7"></path>
                                    <path class="btn-arrow-tip" d="M1 1l4 4-4 4"></path>
                                </g>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="layout-mockup">
                   <img class="layout-mockup-img" src="assets/img/layout-mockup.png" alt="Layout Mockup">
                </div>
            </div>
        <?php endif; ?>
    </header>