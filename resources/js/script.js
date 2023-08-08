// PAGINA REGISTRATI E LOGIN

const signInBtn = document.getElementById("signIn");
const signUpBtn = document.getElementById("signUp");
const container = document.querySelector(".wrapper-form");

if (signInBtn && signUpBtn) {
  signInBtn.addEventListener("click", () => {
    container.classList.remove("right-panel-active");
  });
  
  signUpBtn.addEventListener("click", () => {
    container.classList.add("right-panel-active");
  });
}


// DARK-LIGHT MODE
let navbar = document.querySelector('#navbar');
let modeActivator = document.querySelector('#modeActivator');
let body = document.body;
let header = document.querySelector('#header');
let btns = document.querySelectorAll('.btn-custom');
let categoryCards = document.querySelectorAll('.category-card');
let footer = document.querySelector('#footer');
let wrapperAuth = document.querySelector('#wrapperAuth');
let cardsArticle = document.querySelectorAll('.cardsArticle');
let catDropdowns = document.querySelectorAll('.cat-dropdowns');
let catBtns = document.querySelectorAll('.btn-custom-cat');
let cardShowCustom = document.querySelector('.cardShow-custom');
let cardShowCustom2 = document.querySelector('.cardShow-custom2');




let check = localStorage.getItem('darkMode') === 'true';


if (check) {
    enableDarkMode();
}

modeActivator.addEventListener('click', () => {
    check = !check;
    if (check) {
        enableDarkMode();
    } else {

      window.addEventListener('scroll', ()=>{

        let scrolled = window.scrollY;
    
        if (window.innerWidth > 768) {
          
          if(scrolled > 0){
            navbar.style.height = '70px';
            navbar.style.backgroundColor = 'var(--violet)';
          }else{
            navbar.style.height = '90px';
            navbar.style.backgroundColor = 'var(--violet)';
          }
    
        }
    
      });

        disableDarkMode();
    }
    localStorage.setItem('darkMode', check);
});

function enableDarkMode() {
    navbar.style.backgroundColor = 'black';
    window.addEventListener('scroll', () => {
      let scrolled = window.scrollY;
      if (window.innerWidth > 768) {
        
        if(scrolled > 0){
          navbar.style.height = '70px';
          navbar.style.backgroundColor = 'black';
        }else{

          navbar.style.height = '90px';
          navbar.style.backgroundColor = 'black';
        }

      }
    });

    body.classList.add('body-dark');
    btns.forEach(btn => {
        btn.classList.add('btn-custom-dark');
    });

    categoryCards.forEach(categoryCard => {
        categoryCard.classList.add('category-card-dark');
    });

    footer.classList.add('footer-custom-dark');
    footer.classList.remove('footer-custom');
    if (header) {
      header.classList.add('bg-custom-dark');
    };

    if (wrapperAuth) {
      wrapperAuth.classList.add('wrapper-auth-dark');
      wrapperAuth.classList.remove('wrapper-auth');
    };

    if (cardsArticle) {
      cardsArticle.forEach(cardArticle => {
        cardArticle.classList.add('card-custom-dark');
        cardArticle.classList.remove('card-custom');
      });
      
    }

    if (catDropdowns) {
      catDropdowns.forEach(catDropdown => {
        catDropdown.classList.add('bg-black');
      });
    }

    if (catBtns) {
      catBtns.forEach(catBtn => {
        catBtn.classList.add('btn-custom-cat-dark');
      });
    }

    if (cardShowCustom && cardShowCustom2) {
      cardShowCustom.classList.add('text-white');
      cardShowCustom2.classList.add('text-white');
    }
    
}

function disableDarkMode() {
    body.classList.remove('body-dark');
    btns.forEach(btn => {
        btn.classList.remove('btn-custom-dark');
    });

    categoryCards.forEach(categoryCard => {
        categoryCard.classList.remove('category-card-dark');
    });

    footer.classList.add('footer-custom');
    footer.classList.remove('footer-custom-dark');
    if (header) {
      header.classList.remove('bg-custom-dark');
    };

    if (wrapperAuth) {
      wrapperAuth.classList.add('wrapper-auth');
      wrapperAuth.classList.remove('wrapper-auth-dark');
    };

    if (cardsArticle) {
      cardsArticle.forEach(cardArticle => {
        cardArticle.classList.remove('card-custom-dark');
        cardArticle.classList.add('card-custom');
      });
      
    }

    if (catDropdowns) {
      catDropdowns.forEach(catDropdown => {
        catDropdown.classList.remove('bg-black');
      });
    }

    if (catBtns) {
      catBtns.forEach(catBtn => {
        catBtn.classList.add('btn-custom-cat');
      });
    }

    if (cardShowCustom && cardShowCustom2) {
      cardShowCustom.classList.remove('text-white');
      cardShowCustom2.classList.remove('text-white');
    }
}


// SWIPER CAROUSEL
var swiper = new Swiper(".mySwiper", {
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".mySwiper2", {
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});



