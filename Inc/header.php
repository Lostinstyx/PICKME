<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <title>PICKME</title>

    <link rel="stylesheet" href="assets/flexslider/flexslider.css" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<header>

    <div class="wrap_header">
        <div class="nav_container" id="nav_container">
            <!--Menu burger-->
            <nav>
                <div class="burger-button">
                    <span class="burger-top"></span>
                    <span class="burger-middle"></span>
                    <span class="burger-bottom"></span>
                </div>
                <div class="burger-menu">
                    <a id="create-user">Inscription</a>
                    <a id="connect-user">Connexion</a>
                    <a href="index.php">Home</a>
                    <div class="burger_active">
                    <a class="" href="">Services</a>
                    <a href="">Link</a>
                    <a href="">Link</a>
                    <a href="">Link</a>
                    </div>
                </div>
            </nav>
            <!--Menu burger-->
            <div class="logo">
                <img src="assets/img/logo.png" alt="logo de l'entreprise">
            </div>

            <nav class="nav" id="nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Link</a></li>
                    <li><a href="equipe.php">Team</a></li>
                    <li><a href="">Link</a></li>
                </ul>
            </nav>
            <div id="dialog-form" title="Inscription">
                <p class="validateTips">Les champs doivent tous être remplis..</p>

                <form class="modal_form">
                    <label class="modalLabel" for="nom">Nom :</label>
                    <input type="text" name="nom" id="nom" value="" placeholder="Nom..."
                           class="text ui-widget-content ui-corner-all"/>
                    <label class="modalLabel" for="prenom">Prenom :</label>
                    <input type="text" name="prenom" id="prenom" value="" placeholder="Prenom..."
                           class="text ui-widget-content ui-corner-all"/>
                    <label class="modalLabel" for="email">Email :</label>
                    <input type="text" name="email" id="email" value="" placeholder="Email..."
                           class="text ui-widget-content ui-corner-all"/>

                    <label class="radioLine" for="recruteur">Recruteur :</label>
                    <input type="radio" id="recruteur" name="role" value="recruteur"/>


                    <label class="radioLine" for="candidat">Candidat :</label>
                    <input type="radio" id="candidat" name="role" value="candidat"/>


                    <label class="modalLabel" for="mdp">Mot de passe :</label>
                    <input type="password" name="mdp" id="mdp" value="" placeholder="Mot de passe..."
                           class="text ui-widget-content ui-corner-all"/>

                    <!-- Allow form submission with keyboard without duplicating the dialog button -->
                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px;">

                </form>
            </div>

            <div id="dialog-form" title="Connexion">
                <p class="validateTips">Les champs doivent tous être remplis..</p>

                <form class="modal_form">

                    <label class="modalLabel" for="email">Email :</label>
                    <input type="text" name="email" id="email" value="" placeholder="Email..."
                           class="text ui-widget-content ui-corner-all"/>

                    <label class="modalLabel" for="mdp">Mot de passe :</label>
                    <input type="password" name="mdp" id="mdp" value="" placeholder="Mot de passe..."
                           class="text ui-widget-content ui-corner-all"/>

                    <!-- Allow form submission with keyboard without duplicating the dialog button -->
                    <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">

                </form>
            </div>

            <div class="connect">
                <ul>
                    <li id="create-user"><a>Inscription</a></li>
                    <li id="connect-user"><a>Connexion</a></li>
                </ul>
            </div>

        </div>
        <div class="clear"></div>

</header>

