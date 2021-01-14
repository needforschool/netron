<?php
require('./src/inc/functions.php');
$title = 'Qui sommes nous';
include('./src/template/header.php');
?>

<div id="about">
    <div class="container">
        <div class="about">
            <div class="container">
                <h1 class="common-pagetitle title">L'analyse facile et rapide</h1>
                <p class="common-introtext intro">
                    Netron est une entreprise de technologie qui développe une infrastructure réseaux pour Internet.
                    Les entreprises de toutes tailles, des startups aux sociétés possédent un réseaux, utilisent notre suite
                    d'outils pour comprendre au mieux leur trames réseaux.
                </p>
            </div>
        </div>
    </div>
</div>
<section class="section-padding">
    <div class="background_container"></div>
    <div class="container-lg">
        <div class="txt-about">
            <h3 class="txt-big">Le potentiel du réseaux en ligne</h3>
            <p class="txt-medium">Bien que l'expenstion des entreprises en ligne soit plus rapide que celle du reste de l’économie, seulement <span class="u-emphasis">3% </span> du commerce mondial a lieu en ligne.</p>
            <p class="txt-medium">La complexité réglementaire, un système financier mondial pour le moins tortueux et une pénurie d’ingénieurs limitent l’impact de l’économie en ligne.</p>
            <p class="txt-medium">La suppression des barrières pour les réseaux en ligne permet à de nouvelles entreprises de se lancer, favorise la croissance des entreprises existantes et augmente l'efficacité d'analyser un réseau de manière globale.</p>
        </div>
        <div class="swiper-container2">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(assets/img/tree.png)"></div>
                <div class="swiper-slide" style="background-image:url(assets/img/sort.png)"></div>
                <div class="swiper-slide" style="background-image:url(assets/img/tab.png)"></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<section id="preview" style="margin-top: 0; margin-bottom: -180px;">
    <div class="background-blue-primary"></div>
    <div class="preview-wrapper container">
        <div class="preview-text">
            <h3 class="preview-text-tag">Conçue pour vous</h3>
            <h1 class="preview-text-title">L'une des interfaces les plus simple rapide et efficace de son domaine</h1>
            <p class="preview-text-desc">Notre Dashboard simple d'utilisation et de compréhension permet le suivi de trame facilement et rapidement, grace notamment aux tries possibles des trames ainsi que des statistiques compréhensibles par tous.</p>
        </div>
        <div class="preview-slider">
            <video class="video-item" autoplay loop playinline muted>
                <source src="./assets/media/dashboard-preview-desktop.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</section>
<!-- Swiper -->


<?php
include('./src/template/footer.php');
