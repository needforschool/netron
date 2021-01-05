const header = document.getElementById('header');
const navResponsive = header.querySelector('.nav-responsive');
let xhr = new XMLHttpRequest();

const init = () => {
  initSwiper();
  initNavbarResponsive();
  initModal();
  initLocalization();
  initFormRegister();
  initFormLogin();
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

  $('header [role="btn-dashboard"]').click(() => {
    window.location.href = './dashboard'
  });

  header.querySelectorAll('[role="btn-modal-login"]').forEach(element => {
    element.addEventListener('click', (e) => {
      e.preventDefault();
      navResponsive.classList.remove('active');
      modalsWrapper.classList.toggle('active');
    });
  });

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

const initFormRegister = () => {
  const form = $('.form-register');
  form.on('submit', (e) => {
    e.preventDefault();
    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
      data: form.serialize(),
      dataType: 'json',
      success: (response) => {
        console.log(response);
        if(response.success) window.location.href = './dashboard';
      },
      error: () => {
        console.log('Request failed');
      }
    })
  });
}

const initFormLogin = () => {
  const form = $('.form-login');
  form.on('submit', (e) => {
    e.preventDefault();
    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
      data: form.serialize(),
      dataType: 'json',
      success: (response) => {
        console.log(response);
        if(response.success) window.location.href = './dashboard';
      },
      error: () => {
        console.log('Request failed');
      }
    })
  });
}

init();