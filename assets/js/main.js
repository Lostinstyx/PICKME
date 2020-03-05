$(window).load(function () {

    $('.flexslider.flex1').flexslider({
        slideshowSpeed: 5000,
        controlNav: false,
        directionNav: false,
    });

    //CV BUILDER
    var i=1;
    $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="add_formation[]" placeholder="Intitulé du diplôme" class="form-control name_list" /></td>' +
            '<td><input type="text" name="add_diplomedate[]" placeholder="Date d\'obtention" class="form-control name_list" /></td>' +
            '<td><input type="text" name="add_lieu[]" placeholder="Etablissement" class="form-control name_list" /></td>' +
            '<td><input type="text" name="add_work[]" placeholder="Tâches effectuées lors de votre formation" class="form-control name_list" /></td>' +
            '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $('#add_xp').click(function(){
        i++;
        $('#dynamic_field_xp').append('<tr id="row'+i+'"><td><input type="text" name="add_post[]" placeholder="Intitulé du poste" class="form-control name_list" /></td>' +
            '<td><input type="text" name="add_entreprise[]" placeholder="Entreprise" class="form-control name_list" /></td>' +
            '<td><input type="text" name="add_place[]" placeholder="Lieu" class="form-control name_list" /></td>' +
            '<td><input type="text" name="add_taches[]" placeholder="Description des tâches effectués" class="form-control name_list" /></td>' +
            '<td><input type="text" name="add_time[]" placeholder="Période" class="form-control name_list" /></td>' +
            '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
    });

    //END CV BUILDER

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
});



$(document).ready(function(){
    $.ajaxSetup({ cache: false });
    $('#rechercheMetier').keyup(function(){
        $('#resultRecherche').html('');
        $('#state').val('');
        var searchField = $('#rechercheMetier').val();
        var expression = new RegExp(searchField, "i");
        $.getJSON("assets/js/metier.json", function(data) {
            $.each(data, function(key, value){
                    if (value.libelle_metier.search(expression) !== -1)
                    {
                        $('#resultRecherche').append('<li>'+value.libelle_metier+'</li>');
                    }
            });
        });
    });

    $('#resultRecherche').on('click', 'li', function() {
        var click_text = $(this).text().split('|');
        $('#rechercheMetier').val($.trim(click_text[0]));
        $("#resultRecherche").html('');
    });
});

$("[data-toggle]").click(function() {
    var target = $(".text-form");
    if($(this).prop('checked')) {
        target.html('<a class="linkInscription" href = "inscription-candidat.php">Cliquez ici pour vous inscrire en tant que candidat</a>');
    } else {
        target.html('<a class="linkInscription" href = "inscription-recruteur.php">Cliquez ici pour vous inscrire en tant que recruteur</a>');
    }
});