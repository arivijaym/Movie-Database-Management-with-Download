// Add the following JavaScript code
document.addEventListener('DOMContentLoaded', function () {
  // Select the navbar element
  var navbar = document.querySelector('.navbar');

  // Add a scroll event listener to the window
  window.addEventListener('scroll', function () {
    // Check the scroll position
    if (window.scrollY > 0) {
      // If scrolled down, add the fixed-navbar class
      navbar.classList.add('fixed-navbar');
    } else {
      // If at the top, remove the fixed-navbar class
      navbar.classList.remove('fixed-navbar');
    }
  });
});