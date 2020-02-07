<?php
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Dialog - Modal form</title>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>

        label, input {
            display: block;
            margin-top: 10px;
        }

        input.text {
            margin-bottom: 12px;
            width: 95%;
            padding: .4em;
        }

        fieldset {
            padding: 0;
            border: 0;
            margin-top: 25px;
        }

        h1 {
            font-size: 1.2em;
            margin: .6em 0;
        }

        div#users-contain {
            width: 350px;
            margin: 20px 0;
        }

        div#users-contain table {
            margin: 1em 0;
            border-collapse: collapse;
            width: 100%;
        }

        div#users-contain table td, div#users-contain table th {
            border: 1px solid #eee;
            padding: .6em 10px;
            text-align: left;
        }

        .ui-dialog{
            border-radius: 5%;
            background: transparent;
        }

        .ui-dialog .ui-state-error {
            padding: .3em;
        }

        .ui-dialog-title {
           text-align: center;
        }

        .ui-dialog-titlebar{
            background-color : transparent;
            margin: 0 auto;
            width: 80%;
            border: none;
        }
        .ui-dialog-buttonpane{
            background-color: transparent;
            margin: 0 auto;
            width: 60%;
        }


        .validateTips {
            border: 1px solid transparent;
            padding: 0.3em;
            color: darkred;
        }

        .radioLine {
            display: inline-block;

        }

        input[type=radio]{
            display: inline-block;
            margin-right : 10%;
            margin-bottom: 12px;
        }


    </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
$( function() {
    var dialog, form,

      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      nom = $( "#nom" ),
        prenom = $( "#prenom" ),
      email = $( "#email" ),
      mdp = $( "#password" ),
      allFields = $( [] ).add( nom ).add( prenom ).add( email ).add( mdp ),
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

    function addUser() {
        var valid = true;
        allFields.removeClass( "ui-state-error" );

        valid = valid && checkLength( nom, "nom", 1, 30 );
        valid = valid && checkLength( prenom, "prenom", 1, 30 );
        valid = valid && checkLength( email, "email", 6, 80 );
        valid = valid && checkLength( mdp, "Mot de passe", 5, 25 );

        valid = valid && checkRegexp( nom, /^[a-z]([a-z_\s])+$/i, "Votre nom ne doit contenir que des lettres, des underscores ou des espaces." );
        valid = valid && checkRegexp( prenom, /^[a-z]([a-z_\s])+$/i, "Votre prenom ne doit contenir que des lettres, des underscores ou des espaces." );
        valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );


      if ( valid ) {
          $( "#users tbody" ).append( "<tr>" +
              "<td>" + nom.val() + "</td>" +
              "<td>" + prenom.val() + "</td>" +
              "<td>" + email.val() + "</td>" +
              "<td>" + mdp.val() + "</td>" +
              "</tr>" );
          dialog.dialog( "close" );
      }
      return valid;
    }

    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 550,
      width: 380,
      modal: true,
      buttons: {
        "Inscription": addUser,
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

    $( "#create-user" ).button().on( "click", function() {
        dialog.dialog( "open" );
    });
  } );
  </script>
</head>
<body>

<div id="dialog-form" title="Inscription">
    <p class="validateTips">Les champs doivent tous être remplis..</p>

    <form>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="" placeholder="Nom..."
               class="text ui-widget-content ui-corner-all"/>
        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom" id="prenom" value="" placeholder="Prenom..."
               class="text ui-widget-content ui-corner-all"/>
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" value="" placeholder="Email..."
               class="text ui-widget-content ui-corner-all"/>

        <label class="radioLine" for="recruteur">Recruteur :</label>
        <input type="radio" id="recruteur" name="role" value="recruteur"/>


        <label class="radioLine" for="candidat">Candidat :</label>
        <input type="radio" id="candidat" name="role" value="candidat"/>



        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" value="" placeholder="Mot de passe..."
               class="text ui-widget-content ui-corner-all"/>

        <!-- Allow form submission with keyboard without duplicating the dialog button -->
        <input type="submit" tabindex="-1" style="position:absolute; top:-1000px;">

    </form>
</div>


<button id="create-user">Inscription</button>


</body>
</html>