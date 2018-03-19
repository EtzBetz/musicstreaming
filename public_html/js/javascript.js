window.onscroll = function() {shrinkingHeader()};

var header = document.getElementById("header");

/* Dynamic Height for spacer of the header div */ /*
var headerContainer = document.getElementById("headerContainer");
var headerSpacer = document.getElementById("headerSpacer");
var containerHeight = headerContainer.clientHeight.toString();
headerSpacer.style.height = containerHeight + "px"; */


// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function shrinkingHeader() {
    //console.log(window.pageYOffset); // TODO: remove later
    if (window.pageYOffset > 20) {
        header.classList.add("shrink")
    } else {
        header.classList.remove("shrink");
    }
}

function hideInfo(infoCard) {
    document.cookie = "cookiesAccepted=1; path=/";
    infoCard.remove();
}