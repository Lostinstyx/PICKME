$(window).load(function () {


    $('#form-recruteur').hide();
    $('#form-candidat').hide();

    $('.flexslider.flex1').flexslider({
        slideshowSpeed: 5000,
        controlNav: false,
        directionNav: false,
    });


    var n = 85; // Nombre final du compteur
    var cpt = 0; // Initialisation du compteur
    var duree = 2.5; // Durée en seconde pendant laquel le compteur ira de 0 à X
    var delta = Math.ceil((duree * 1000) / n); // On calcule l'intervalle de temps entre chaque rafraîchissement du compteur (durée mise en milliseconde)
    var node =  document.getElementById("percents");

    function countdown() {
        node.innerHTML = ++cpt + "%" ;
        if( cpt <= n ) { // Si on est pas arrivé à la valeur finale, on relance notre compteur une nouvelle fois
            setTimeout(countdown, delta);
        } else {
            node.innerHTML = "85%"
        }
    }
    return countdown();

});


$(window).scroll(function() {

    var nav = document.getElementById("nav_container");
    var navPos = nav.offsetTop;

    if (window.pageYOffset > navPos) {
        nav.classList.add("sticky");
    } else {
        nav.classList.remove("sticky");
    }


    var bar = document.getElementById("h2_offset")
    var barPos = bar.offsetTop;

    if (window.pageYOffset >= barPos) {

        var getPercent = ($('.progress-wrap').data('progress-percent') / 100);
        var getProgressWrapWidth = $('.progress-wrap').width();
        var progressTotal = getPercent * getProgressWrapWidth;
        var animationLength = 2500;

        $('.progress-bar').stop().animate({
            left: progressTotal
        }, animationLength);
    }
});

$( document ).ready(function() {
    $(".burger-button").click(function(){
        $(".burger-button").toggleClass("active");
        $(".burger-menu").toggleClass("active");
    });

    $('input[name=typeregister]').on('change', function() {
        var choice = $(this).val();
        switch(choice)
        {
            case 'choicerecruteur':
                $('#form-candidat').hide();
                $('#form-recruteur').show();
                break;
            case 'choicecandidat':
                $('#form-recruteur').hide();
                $('#form-candidat').show();
                break;
        }
    });

});





