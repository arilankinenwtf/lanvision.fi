
window.onload = function() {
    offsetY();
}
    
window.onscroll = function() {
    offsetY()
};



var scrollTop = $(window).scrollTop();
var pixels = 0;
var move = 0;

function offsetY() {
    scrollTop = $(window).scrollTop();

    pixels = (scrollTop);

    $('.earth').css({"transform":"translate(" + pixels + "px,0px)"});
    $('.jupiter').css({"transform":"translate(-" + pixels + "px,0px)"});
    $('.saturnus').css({"transform":"translate(+" + pixels + "px,0px)"});

    $('.earth').css({"transition": "transform 3s ease"});
    $('.jupiter').css({"transition": "transform 3s ease"});
    $('.saturnus').css({"transition": "transform 3s ease"});

}