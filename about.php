<?php
require('./src/inc/functions.php');
$title = 'Qui sommes nous';
include('./src/template/header.php');
?>

<div class="overflow-hidden">
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
        <div class="background_container2"></div>
    </section>
</div>
<!-- Swiper -->


<?php
include('./src/template/footer.php');
