// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("navbar");

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
    console.log(window.pageYOffset);
    if (window.pageYOffset > 20) {
        navbar.classList.add("shrink")
    } else {
        navbar.classList.remove("shrink");
    }
}