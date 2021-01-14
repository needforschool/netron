<?php
require('./src/inc/functions.php');
$title = 'Qui sommes nous';
include('./src/template/header.php');
?>

<div id="about">
    <div class="container">
        <div class="about">
            <div class="container">
                <h1 class="common-pagetitle title">Notre mission est <br> d'augmenter le PIB d'internet</h1>
                <p class="common-introtext intro">
                    Netron est une entreprise de technologie qui développe une infrastructure économique pour Internet.
                    Les entreprises de toutes tailles, des startups aux sociétés cotées en bourse, utilisent notre suite
                    d'outils pour accepter des paiements et gérer leur activité en ligne.
                </p>
            </div>
        </div>
    </div>
</div>
<section class="section-padding">
    <div class="background_container"></div>
    <div class="container-lg">
        <div class="txt-about">
            <h3 class="txt-big">Le potentiel de l’économie en ligne</h3>
            <p class="txt-medium"> Bien que la croissance des entreprises en ligne soit plus rapide que celle du reste de l’économie, seulement <span class="u-emphasis">3 % </span> du commerce mondial a lieu en ligne.</p>
            <p class="txt-medium">La complexité réglementaire, un système financier mondial pour le moins tortueux et une pénurie d’ingénieurs limitent l’impact de l’économie en ligne.</p>
            <p class="txt-medium">La suppression des barrières au commerce en ligne permet à de nouvelles entreprises de se lancer, favorise la croissance des entreprises existantes et augmente les retombées économiques et les échanges commerciaux de manière globale.</p>
        </div>
        <div class="swiper-container2">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/202/1920/1080)"></div>
                <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/233/1920/1080)"></div>
                <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/222/1920/1080)"></div>
                <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/666/1920/1080)"></div>
                <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/16/1920/1080)"></div>
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
            <h3 class="preview-text-tag">Conçue pour vous</h1>
                <h1 class="preview-text-title">L'une des interfaces les plus simple rapide et efficace de son
                    domaine</h1>
                <p class="preview-text-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ex
                    debitis dignissimos? Ad deleniti accusantium, deserunt quisquam, repellat velit praesentium
                    natus, voluptas explicabo et pariatur fugit? Aut tempora rerum assumenda amet recusandae odit
                    nihil natus, fuga distinctio velit harum ducimus sunt placeat accusantium facere dicta quas
                    quaerat in et. Dolorem!</p>
                <div class="preview-text-btn">
                    <a class="btn btn-blue-secondary" href="./about.php">En savoir plus
                        <svg class="btn-arrow" width="10" height="10" viewBox="0 0 10 10" aria-hidden="true">
                            <g fill-rule="evenodd">
                                <path class="btn-arrow-line" d="M0 5h7"></path>
                                <path class="btn-arrow-tip" d="M1 1l4 4-4 4"></path>
                            </g>
                        </svg>
                    </a>
                </div>
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
