window.onscroll = function() {shrinkingHeader()};

var header = document.getElementById("header");
var songtextbutton = document.getElementById("song__songtext-button");

var allDivs = document.getElementsByClassName("content--add-horizontal-scroll");
Array.from(allDivs).forEach(function(element) {
    checkScroll(element);
});


// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function shrinkingHeader(){
    //console.log(window.pageYOffset); // TODO: remove later
    if (window.pageYOffset > 20) {
        header.classList.add("js-header__navigation--shrink")
    } else {
        header.classList.remove("js-header__navigation--shrink");
    }
}

function hideInfo(infoCard){
    infoCard.addEventListener("animationend", function(){
        infoCard.remove();
    });
    infoCard.classList.add("js-info__card--exiting");
    setCookiesAccepted(); // TODO: fix this to only use when the cookie card is clicked, not on every card
}

function setCookiesAccepted(){ // TODO: use this function to set cookieCookie, also figure out how to do that..
    document.cookie = "cookiesAccepted=1; path=/";
}

function toggleSongtext(){
    songtextbutton.classList.toggle("js-songtext--show");
}

function scrollHorizontal(button, direction) {
    var scrollAmount = (window.innerWidth * 0.8);
    if (direction === "left") {
        scrollAmount = -scrollAmount;
    }
    button.parentElement.nextElementSibling.scrollBy({ top: 0, left: scrollAmount, behavior: 'smooth' });
}

function checkScroll(container) {
    container.previousElementSibling.lastElementChild.disabled = container.scrollWidth <= container.scrollLeft + window.innerWidth;
    container.previousElementSibling.firstElementChild.disabled = container.scrollLeft <= 0;
}