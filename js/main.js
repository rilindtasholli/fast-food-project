//realizimi i slider

$("#slideshow > div:gt(0)").hide();

setInterval(function() {
$('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 4500);




var goTop = document.getElementById("goTop");


window.onscroll = function() {

    if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        goTop.style.display = "block";
    } else {
        goTop.style.display = "none";
    }

};


function goTopFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}



