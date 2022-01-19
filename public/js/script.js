let menuButton = document.getElementById('menu-icon');
let closeButton = document.getElementById('close-icon');
let navBar = document.getElementById('nav');
let navLink = document.getElementById('nav-link');
let searchIcon = document.getElementById('search-icon');
let searchBar = document.getElementById('search-box');
let logo = document.getElementById('logo');
let navWrapper = document.getElementById('wrapper');


searchIcon.addEventListener('click', function() {
    searchBar.toggleAttribute('hidden');
})

window.onscroll = function() {scrollMenu()};

function scrollMenu() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    navBar.classList.add('nav-colored');

    logo.hidden =true;
  }
  else {
      navBar.classList.remove('nav-colored');

      logo.hidden =false;

  }
}

menuButton.addEventListener('click', function() {


    navLink.style.display = 'flex';
    closeButton.hidden = false;
    navWrapper.style.backgroundColor = 'black';
    menuButton.hidden = true;


})

closeButton.addEventListener('click', function() {
    navLink.style.display = 'none';
    navWrapper.style.backgroundColor = 'transparent';
    menuButton.hidden = false;
    closeButton.hidden = true;
})
