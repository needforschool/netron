<?php
$title = 'Accueil';
include('src/template/header.php');
?>
<section id="layout">
    <div class="background-rainbow"></div>
    <div class="layout-wrapper container">
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
    <div class="layout-partners container">
        <a href="https://campus-saint-marc.com/" class="layout-partners-link">
            <img class="layout-partners-img" src="./assets/img/campus.png" alt="Logo Partner Campus Saint Marc ">
        </a>

        <a href="https://onruntime.com/" class="layout-partners-link">
            <img class="layout-partners-img" src="https://cdn.onruntime.com/img/logo/logo.png" alt="Logo Partner onRuntime">
        </a>
        <a href="https://nfactory.school/" class="layout-partners-link">
            <img class="layout-partners-img" src="./assets/img/nfactoy.png" alt="Logo Partner NFactory School">
        </a>
    </div>
</section>