// Get the mobile menu icon and the mobile sub-menu
const mobileMenuIcon = document.querySelector('.mobile-menu-icon');
const mobileSubMenu = document.querySelector('.htmlCss-sub-menu sub-menu');

// Add a click event listener to the mobile menu icon
mobileMenuIcon.addEventListener('click', () => {
  // Toggle the 'active' class on the mobile sub-menu
  mobileSubMenu.classList.toggle('active');
});

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }