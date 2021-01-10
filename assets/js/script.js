const header = document.getElementById('header');
const navResponsive = header.querySelector('.nav-responsive');
let xhr = new XMLHttpRequest();

const init = () => {
  initSwiper();
  initNavbarResponsive();
  initModal();
  initLocalization();
  initForm('.form-contact');
  initForm('.form-login', (response) => {
    if (response.success) window.location.href = './dashboard';
  })
  initForm('.form-register', (response) => {
    if (response.success) window.location.href = './dashboard';
  })
}

const initSwiper = () => {
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
}

const initNavbarResponsive = () => {
  header.querySelector('.nav-burger').addEventListener('click', () => {
    if (navResponsive.style.display == 'none' || !navResponsive.style.display) navResponsive.style.display = 'flex';
    navResponsive.classList.toggle('active');
  })
}

const initModal = () => {
  const modalsWrapper = header.querySelector('.modal-wrapper');
  const modalCloseButton = modalsWrapper.querySelector('.modal-close');
  const btnRegister = modalsWrapper.querySelector('[role="btn-register"]');
  const btnLogin = modalsWrapper.querySelector('[role="btn-login"]');
  const formRegister = modalsWrapper.querySelector('.form-register');
  const formLogin = modalsWrapper.querySelector('.form-login');

  modalCloseButton.addEventListener('click', () => {
    modalsWrapper.classList.toggle('active');
  });

  modalsWrapper.addEventListener('click', (e) => {
    if (e.target == modalsWrapper) {
      modalsWrapper.classList.toggle('active');
    }
  });

  $('[role="btn-dashboard"]').click(() => {
    window.location.href = './dashboard'
  });

  $('[role="btn-modal-login"]').click((e) => {
    e.preventDefault();
    navResponsive.classList.remove('active');
    modalsWrapper.classList.toggle('active');
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
}

const initLocalization = () => {
  const footerItemLocalization = document.querySelector('[role="localization"]');
  $.ajax({
    type: 'GET',
    url: 'http://ip-api.com/json',
    success: (response) => {
      footerItemLocalization.textContent = footerItemLocalization.textContent.replace('-', response.country);
    },
    error: () => {
      console.log('Request failed');
    }
  });
}

const initForm = (formClass, successHandler = () => { }) => {
  const form = $(formClass);
  form.on('submit', (e) => {
    e.preventDefault();
    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
      data: form.serialize(),
      dataType: 'json',
      success: (response) => {
        successHandler(response);
        if (response.success) {
          if (!$('.btn[type="submit"]').hasClass('btn-success')) {
            $('.btn[type="submit"]').toggleClass('btn-success');
            setTimeout(() => {
              $('.btn[type="submit"]').toggleClass('btn-success');
            }, 2000)
          }
        } else {
          if (!$('.btn[type="submit"]').hasClass('btn-error')) {
            $('.btn[type="submit"]').toggleClass('btn-error');
            setTimeout(() => {
              $('.btn[type="submit"]').toggleClass('btn-error');
            }, 2000)
          }
        }
      },
      error: () => {
        if (!$('.btn[type="submit"]').hasClass('btn-error')) {
          $('.btn[type="submit"]').toggleClass('btn-error');
          setTimeout(() => {
            $('.btn[type="submit"]').toggleClass('btn-error');
          }, 2000)
        }
      }
    })
  });
}

init();