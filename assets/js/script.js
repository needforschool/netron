const header = document.getElementById('header');
const navResponsive = header.querySelector('.nav-responsive');

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
  const modalsWrapper = $('.modal-wrapper');
  const modalCloseButton = $('.modal-wrapper .modal-close');
  const btnRegister = $('.modal-wrapper [role="btn-register"]');
  const btnLogin = $('.modal-wrapper [role="btn-login"]');
  const formRegister = $('.modal-wrapper .form-register');
  const formLogin = $('.modal-wrapper .form-login');

  modalCloseButton.click((e) => {
    if (e.target == document.querySelector('.modal-wrapper')) {
      modalsWrapper.toggleClass('active');
    }
  })

  modalsWrapper.click((e) => {
    if (e.target == document.querySelector('.modal-wrapper')) {
      modalsWrapper.toggleClass('active');
    }
  })

  $('[role="btn-dashboard"]').click((e) => {
    e.preventDefault();
    window.location.href = './dashboard'
  });

  $('[role="btn-modal-login"]').click((e) => {
    e.preventDefault();
    navResponsive.classList.remove('active');
    modalsWrapper.css('display', 'flex').toggleClass('active');
  });

  btnRegister.click((e) => {
    e.preventDefault();
    formLogin.style.display = 'none';
    formRegister.style.display = 'flex';
  });

  btnLogin.click((e) => {
    e.preventDefault();
    formLogin.style.display = 'none';
    formRegister.style.display = 'flex';
  });
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