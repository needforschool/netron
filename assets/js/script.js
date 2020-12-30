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
const header = document.getElementById('header');
const navResponsive = header.querySelector('.nav-responsive')
header.querySelector('.nav-burger').addEventListener('click', () => {
  if (navResponsive.style.display == 'none' || !navResponsive.style.display) navResponsive.style.display = 'flex';
  navResponsive.classList.toggle('active');
})

/* modal */
const modalsWrapper = header.querySelector('.modal-wrapper');
const modalCloseButton = modalsWrapper.querySelector('.modal-close');
const btnRegister = modalsWrapper.querySelector('[role="btn-register"]');
const btnLogin = modalsWrapper.querySelector('[role="btn-login"]');
const formRegister = modalsWrapper.querySelector('.form-register');
const formLogin = modalsWrapper.querySelector('.form-login');

modalCloseButton.addEventListener('click', () => {
  modalsWrapper.classList.toggle('active');
})

modalsWrapper.addEventListener('click', (e) => {
  if (e.target == modalsWrapper) {
    modalsWrapper.classList.toggle('active');
  }
})

header.querySelectorAll('[role="btn-modal-login"]').forEach(element => {
  element.addEventListener('click', (e) => {
    e.preventDefault();
    navResponsive.classList.remove('active');
    modalsWrapper.classList.toggle('active');
  });
})

btnRegister.addEventListener('click', (e) => {
  e.preventDefault();
  formLogin.style.display = 'none';
  formRegister.style.display = 'flex';
})

btnLogin.addEventListener('click', (e) => {
  e.preventDefault();
  formRegister.style.display = 'none';
  formLogin.style.display = 'flex';
})
