
const header = document.getElementById('header');
const navResponsive = header.querySelector('.nav-responsive');

const init = () => {
  initSwiper();
  initNavbarResponsive();
  initModal();
  initLocalization();
  initForm('.form-contact');
  initForm('.form-forgot', (response) => {
    console.log(response);
  });
  initForm('.form-recovery', (response) => {
    console.log(response);
  });
  initForm('.form-login', (response) => {
    if (response.success) loginSuccessHandler();
  })
  initForm('.form-register', (response) => {
    if (response.success) loginSuccessHandler();
  })
}

const loginSuccessHandler = () => {
  $.ajax({
    type: 'GET',
    url: './api/logs/add.php',
    success: (res) => {
      if (res.success) window.location.href = './dashboard';
    },
    error: () => {
      console.log('Request failed');
    }
  });
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
  new Swiper('.swiper-container2', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    loop: true,
    coverflowEffect: {
      rotate: 50,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    }
  });
}

const initNavbarResponsive = () => {
  $('header .nav-burger').click(() => {
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
    modalsWrapper.toggleClass('active');
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
    formLogin.css('display', 'none');
    formRegister.css('display', 'flex');
  });

  btnLogin.click((e) => {
    e.preventDefault();
    formLogin.css('display', 'flex');
    formRegister.css('display', 'none');
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
        initError(response.errors);
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

const initError = (errors) => {
  const errorContainer = $('.errors-wrapper .errors-container');
  $.each(errors, (key, value) => {
    console.log(key, value);
    errorContainer.append(`
      <div class="error-item">
        <h6>Une erreur est survenue</h6>
        <p><span>${key}</span>: ${value}</p>
        <div class="btn btn-white" onclick="this.parentNode.remove()">Fermer</div>
      </div>
    `)
  });
}

init();