/* home swiper */

new Swiper('.swiper-container', {
  effect: 'cube',
  grabCursor: true,
  loop: true,
  cubeEffect: {
    shadow: true,
    slideShadows: true,
    shadowOffset: 20,
    shadowScale: 0.94,
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  }
});

/* navbar responsive */
header = document.getElementById('header');
header.querySelector('.nav-burger').addEventListener('click', () => {
  let responsiveVisible = header.querySelector('.nav-responsive').style.display;
  if (responsiveVisible == 'none' || !responsiveVisible) responsiveVisible = 'flex';
  header.querySelector('.nav-responsive').style.display = responsiveVisible;

  header.querySelector('.nav-responsive').classList.toggle('active');
})

