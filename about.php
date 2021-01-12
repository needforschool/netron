<?php
require('./src/inc/functions.php');
$title = 'Qui sommes nous';
include('./src/template/header.php');
?>


<div id="about">
    <div class="container">

        <div class="about">
            <div class="container-lg">
                <h1 class="common-pagetitle title">Notre mission est <br> d'augmenter le PIB d'internet</h1>
                <p class="common-introtext intro">
                    Netron est une entreprise de technologie qui développe une infrastructure économique pour Internet.
                    Les entreprises de toutes tailles, des startups aux sociétés cotées en bourse, utilisent notre suite
                    d'outils pour accepter des paiements et gérer leur activité en ligne.
                </p>
            </div>

            <div class="swiper-container gallery-top">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/237/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/230/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/238/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/235/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/232/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/100/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/100/200/300)"></div>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>
  <div class="swiper-container gallery-thumbs">
    <div class="swiper-wrapper">
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/237/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/237/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/237/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/237/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/237/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/237/200/300)"></div>
      <div class="swiper-slide" style="background-image:url(https://picsum.photos/id/237/200/300)"></div>
    </div>
  </div>

            <div class="team">
                <h1> Notre Equipe
                </h1>
                <div class="card">
                    <div class="circle-container">
                        <h1 style="color:#fff;">JM</h1>
                    </div>
                    <h2>Julien Morel</h2>
                    <h4>CEO</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit.</p>
                </div>



                <div class="card">
                    <div class="circle-container">
                        <h1 style="color:#fff;">AK</h1>
                    </div>
                    <h2>Antoine Kingue</h2>
                    <h4>CEO</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit.</p>
                </div>

                <div class="card">
                    <div class="circle-container">
                        <h1 style="color:#fff;">AK</h1>
                    </div>
                    <h2>Amirouche Kais</h2>
                    <h4>CEO</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit.</p>
                </div>

                <div class="card">
                    <div class="circle-container">
                        <h1 style="color:#fff;">OK</h1>
                    </div>
                    <h2>Oummoul Koulsouwi</h2>
                    <h4>CEO</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur
                        adipiscing elit.</p>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include('./src/template/footer.php');