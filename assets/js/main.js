$(window).load(function () {

    $('.flexslider.flex1').flexslider({
        slideshowSpeed: 5000,
        controlNav: false,
        directionNav: false,
    });

 // Modal inscription
    var dialog, form,

        // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
        emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
        nom = $("#nom"),
        prenom = $("#prenom"),
        email = $("#email"),
        mdp = $("#password"),
        allFields = $([]).add(nom).add(prenom).add(email).add(mdp),
        tips = $(".validateTips");

    function updateTips(t) {
        tips
            .text(t)
            .addClass("ui-state-highlight");
        setTimeout(function () {
            tips.removeClass("ui-state-highlight", 1500);
        }, 500);
    }

    function checkLength(o, n, min, max) {
        if (o.val().length > max || o.val().length < min) {
            o.addClass("ui-state-error");
            updateTips("La longueur du " + n + " doit être entre " +
                min + " et " + max + ".");
            return false;
        } else {
            return true;
        }
    }

    function checkRegexp(o, regexp, n) {
        if (!(regexp.test(o.val()))) {
            o.addClass("ui-state-error");
            updateTips(n);
            return false;
        } else {
            return true;
        }
    }

    function addUser() {
        var valid = true;
        allFields.removeClass("ui-state-error");

        valid = valid && checkLength(nom, "nom", 1, 50);
        valid = valid && checkLength(prenom, "prenom", 1, 50);
        valid = valid && checkLength(email, "email", 6, 80);
        valid = valid && checkLength(mdp, "Mot de passe", 5, 25);

        valid = valid && checkRegexp(nom, /^[a-z]([a-z_\s])+$/i, "Votre nom ne doit contenir que des lettres, des underscores ou des espaces.");
        valid = valid && checkRegexp(prenom, /^[a-z]([a-z_\s])+$/i, "Votre prenom ne doit contenir que des lettres, des underscores ou des espaces.");
        valid = valid && checkRegexp(email, emailRegex, "eg. ui@jquery.com");


        if (valid) {
            $("#users tbody").append("<tr>" +
                "<td>" + nom.val() + "</td>" +
                "<td>" + prenom.val() + "</td>" +
                "<td>" + email.val() + "</td>" +
                "<td>" + mdp.val() + "</td>" +
                "</tr>");
            dialog.dialog("close");
        }
        return valid;
    }

    dialog = $("#dialog-form").dialog({
        autoOpen: false,
        height: 550,
        width: 380,
        modal: true,
        buttons: {
            "Inscription": addUser,
            Annuler: function () {
                dialog.dialog("close");
            }

        },

        close: function () {
            form[0].reset();
            allFields.removeClass("ui-state-error");
        }
    });


    form = dialog.find( "form" ).on( "submit", function( event ) {
        event.preventDefault();
        addUser();
        console.log('error');
    });

    $( "#create-user" ).button().on( "click", function() {
        dialog.dialog( "open" );
    });
    $( "#create-user2" ).button().on( "click", function() {
        dialog.dialog( "open" );
    });

    $( function() {
        var dialog, form,

            // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
            emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,

            email = $( "#email" ),
            mdp = $( "#password" ),
            allFields = $( [] ).add( email ).add( mdp ),
            tips = $( ".validateTips" );

        function updateTips( t ) {
            tips
                .text( t )
                .addClass( "ui-state-highlight" );
            setTimeout(function() {
                tips.removeClass( "ui-state-highlight", 1500 );
            }, 500 );
        }

        function checkLength( o, n, min, max ) {
            if ( o.val().length > max || o.val().length < min ) {
                o.addClass( "ui-state-error" );
                updateTips( "La longueur du " + n + " doit être entre " +
                    min + " et " + max + "." );
                return false;
            } else {
                return true;
            }
        }

        function checkRegexp( o, regexp, n ) {
            if ( !( regexp.test( o.val() ) ) ) {
                o.addClass( "ui-state-error" );
                updateTips( n );
                return false;
            } else {
                return true;
            }
        }

        function connectUser() {
            var valid = true;
            allFields.removeClass( "ui-state-error" );

            valid = valid && checkLength( email, "email", 6, 80 );
            valid = valid && checkLength( mdp, "Mot de passe", 5, 25 );

            valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );


            if ( valid ) {
                $( "#users tbody" ).append( "<tr>" +
                    "<td>" + email.val() + "</td>" +
                    "<td>" + mdp.val() + "</td>" +
                    "</tr>" );
                dialog.dialog( "close" );
            }
            return valid;
        }

        dialog = $( "#dialog-form" ).dialog({
            autoOpen: false,
            height: 390,
            width: 390,
            modal: true,
            buttons: {
                "Connexion": connectUser,
                Annuler: function() {
                    dialog.dialog( "close" );
                }
            },
            close: function() {
                form[ 0 ].reset();
                allFields.removeClass( "ui-state-error" );
            }
        });

        form = dialog.find( "form" ).on( "submit", function( event ) {
            event.preventDefault();
            addUser();
        });

        $( "#connect-user" ).button().on( "click", function() {
            dialog.dialog( "open" );
        });
        $( "#connect-user2" ).button().on( "click", function() {
            dialog.dialog( "open" );
        });
    } );


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
