window.onscroll = function() {shrinkingHeader()};

var header = document.getElementById("header");

/* Dynamic Height for spacer of the header div */ /*
var headerContainer = document.getElementById("headerContainer");
var header__spacer = document.getElementById("header__spacer");
var containerHeight = headerContainer.clientHeight.toString();
header__spacer.style.height = containerHeight + "px"; */


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
}

function setCookiesAccepted(){ // TODO: use this function to set cookieCookie, also figure out how to do that..
    document.cookie = "cookiesAccepted=1; path=/";
}