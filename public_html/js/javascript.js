// When the user scrolls the page, execute myFunction
window.onscroll = function() {shrinkingHeader()};

// Get the navbar
var header = document.getElementById("header");

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function shrinkingHeader() {
    console.log(window.pageYOffset);
    if (window.pageYOffset > 20) {
        header.classList.add("shrink")
    } else {
        header.classList.remove("shrink");
    }
}