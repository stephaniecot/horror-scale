let menuButton = document.getElementById('menu-icon');
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
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    navBar.classList.add('nav-colored');

    logo.hidden =true;
  }
  else {
      navBar.classList.remove('nav-colored');

      logo.hidden =false;

  }
}

menuButton.addEventListener('click', function() {

    if(['none', ''].includes(navLink.style.display)) {
    navLink.style.display = 'flex';
    navWrapper.style.backgroundColor = 'black';
} else {
    navLink.style.display = 'none';
    navWrapper.style.backgroundColor = 'transparent';
}

})
