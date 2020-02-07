$(window).load(function () {

    $('.flexslider.flex1').flexslider({
        slideshowSpeed:5000,
        controlNav: false,
        directionNav: false,
    });
});


$(window).scroll(function() {

    var nav = document.getElementById("nav_container");
    var navPos = nav.offsetTop;

    if (window.pageYOffset > navPos) {
        nav.classList.add("sticky");
    } else {
        nav.classList.remove("sticky");
    }

});


