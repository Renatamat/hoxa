// Build CSS
import '../css/app.css'

// Import JS Modules
import menu_init from './modules/menu'

import $ from 'jquery'
window.jQuery = $;
const fancybox = require('@fancyapps/fancybox');
const fancyboxCSS = require('@fancyapps/fancybox/dist/jquery.fancybox.css');
import {
  tns
} from "../../node_modules/tiny-slider/src/tiny-slider"
import WOW from 'wowjs';
// Load Menu Script
document.addEventListener('DOMContentLoaded', menu_init);

// fancybox
$('[data-fancybox="gallery"]').fancybox({
  // Options will go here
});

// WOW
if (typeof WOW !== 'undefined' && WOW.WOW) {
  new WOW.WOW().init();
}

// toggle kategorii
$(".toggle_cat").click(function () {
  $('.cats').toggleClass("hidden");
});

// OPINIE slider
var opinieEls = document.getElementsByClassName('opinie_slider');
if (opinieEls.length > 0) {
  var slider_opinie = tns({
    container: '.opinie_slider',
    mode: "gallery",
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayButton: false,
    autoplayButtonOutput: false,
    mouseDrag: true,
    animateIn: "fadeIn",
    nav: true,
    speed: 1000,
    swipeAngle: false,
    navPosition: 'bottom',
    controls: false,
    responsive: {
      640: {
        items: 1,
      },
      1024: {
        items: 2,
      },
    }
  });
} else {
  console.log('[DEBUG] opinie_slider not found, skipping slider_opinie init');
}

// GŁÓWNY slider (.slider + .slidNav2)
var mainSliderEls = document.getElementsByClassName('slider');
if (mainSliderEls.length > 0) {
  var slider = tns({
    container: '.slider',
    mode: "gallery",
    items: 1,
    autoplay: true,
    mouseDrag: false,
    autoplayTimeout: 8000,
    autoplayButton: false,
    autoplayButtonOutput: false,
    animateIn: "fadeIn",
    nav: true,
    speed: 200,
    swipeAngle: false,
    navPosition: 'bottom',
    navContainer: '.slidNav2',
    controls: false
  });
} else {
  console.log('[DEBUG] .slider not found, skipping main slider init');
}

// PRODUKT slider (.slider_prod)
var prodSliderEls = document.getElementsByClassName('slider_prod');
if (prodSliderEls.length > 0) {
  var slider_prod = tns({
    container: '.slider_prod',
    mode: "gallery",
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayButton: false,
    autoplayButtonOutput: false,
    mouseDrag: true,
    animateIn: "fadeIn",
    nav: true,
    speed: 600,
    swipeAngle: false,
    navPosition: 'bottom',
    // navContainer: '.slidNav2',
    controls: false,
    responsive: {
      640: {
        items: 1,
      },
      1024: {
        items: 4,
      },
    }
  });
} else {
  console.log('[DEBUG] .slider_prod not found, skipping slider_prod init');
}

// POST slider (.postSlider)
var postSliderEls = document.getElementsByClassName('postSlider');
if (postSliderEls.length > 0) {
  var postSlider = tns({
    container: '.postSlider',
    mode: "gallery",
    autoplay: false,
    mouseDrag: true,
    animateIn: "fadeIn",
    nav: true,
    speed: 1000,
    swipeAngle: false,
    navPosition: 'bottom',
    controlsContainer: '.postslidernav',
    nav: false,
    responsive: {
      640: {
        items: 1,
      },
      1024: {
        items: 3,
      },
    }
  });
} else {
  console.log('[DEBUG] .postSlider not found, skipping postSlider init');
}

// slidHeight init
$(document).ready(function () {
    console.log('a');
  slidHeight();
});
 
$(window).resize(function () {
  slidHeight();
});

function slidHeight() {
  var height = $('.slidImage').width();
  $('.slidImage').height(height);
}
