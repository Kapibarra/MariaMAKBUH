import "./scss/index.scss";
import Inputmask from "inputmask";

/* Nav Scroll */

(function($) {
  $(window).on("load", function() {
      $("a[rel='m_PageScroll2id']").mPageScroll2id();
  });
})(jQuery);

/* SCROLL TO TOP BTN */
const scrollToTopButton = document.getElementById("js-top");
const scrollFunc = () => {
  const y = window.scrollY;
  if (y > 200) {
    scrollToTopButton.className = "top-link show";
  } else {
    scrollToTopButton.className = "top-link hide";
  }
};

window.addEventListener("scroll", scrollFunc);

const scrollToTop = () => {
  const c = document.documentElement.scrollTop || document.body.scrollTop;
  if (c > 0) {
    window.requestAnimationFrame(scrollToTop);
    window.scrollTo(0, c - c / 18);
  }
};

scrollToTopButton.onclick = function (e) {
  e.preventDefault();
  scrollToTop();
};
/* burger */
(function () {
  const hamburger = {
    navToggle: document.querySelector('.nav-toggle'),
    nav: document.querySelector('nav'),

    doToggle: function (e) {
      e.preventDefault();
      this.navToggle.classList.toggle('expanded');
      this.nav.classList.toggle('expanded');
    },
  };
  hamburger.navToggle.addEventListener('click', function (e) { hamburger.doToggle(e); });
  // hamburger.nav.addEventListener('click', function(e) { hamburger.doToggle(e); });
}());


// Burger on click close menu 
const link = document.querySelectorAll('.mobile-nav-link')
for (let i = 0; i < link.length; i++) {
  link[i].addEventListener('click', closeBurger)
}

function closeBurger() {
const navToggle = document.querySelector('.nav-toggle')
const nav = document.querySelector('.nav')

navToggle.classList.remove('expanded');
nav.classList.remove('expanded');
}


// Burger onscroll toggle
function burgerButtonToggle() {
  const burgerButton = document.querySelector(".nav-toggle")
  const yPos = window.scrollY;
  if (yPos > 10) {
    burgerButton.classList.add("unvisible")
    burgerButton.classList.remove("visible");
  } else {
    burgerButton.classList.remove("unvisible");
    burgerButton.classList.add("visible");
  }
}
window.addEventListener("scroll", burgerButtonToggle);

// date year
document.getElementById("year").innerHTML = new Date().getFullYear();

const selector = document.getElementById("phonenum");
const im = new Inputmask("+7(999)-999-99-99");
im.mask(selector);

const selectorModal = document.getElementById("modalphonenum");
const imModal = new Inputmask("+7(999)-999-99-99");
imModal.mask(selectorModal);
