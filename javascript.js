const hamburger = document.querySelector('.hamburger-menu');
const navItems = document.querySelector('.nav-items');

hamburger.addEventListener('click', () => {
  navItems.classList.toggle('show');
});
