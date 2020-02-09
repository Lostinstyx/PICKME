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

        valid = valid && checkLength(nom, "nom", 1, 30);
        valid = valid && checkLength(prenom, "prenom", 1, 30);
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
    } );

    //progress bar


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

    if (window.pageYOffset > barPos) {

            var getPercent = ($('.progress-wrap').data('progress-percent') / 100);
            var getProgressWrapWidth = $('.progress-wrap').width();
            var progressTotal = getPercent * getProgressWrapWidth;
            var animationLength = 2500;

            $('.progress-bar').stop().animate({
                left: progressTotal
            }, animationLength);

        }

});


