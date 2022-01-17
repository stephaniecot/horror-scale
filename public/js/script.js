// document.getElementById('menu-icon').addEventListener('click', function(){
//     alert('HELLO');
// })
let menuButton = document.getElementById('menu-icon');
let navbar = document.getElementById('nav');
let searchIcon = document.getElementById('search-icon');
let searchBar = document.getElementById('search-box');

searchIcon.addEventListener('click', function() {
    searchBar.toggleAttribute('hidden');
})

window.onscroll = function() {scrollMenu()};
console.log(menuButton)
function scrollMenu() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    navbar.classList.add('nav-colored');
    menuButton.removeAttribute('hidden');
  }
  else {
      navbar.classList.remove('nav-colored');
      menuButton.hidden= true;
  }
}
