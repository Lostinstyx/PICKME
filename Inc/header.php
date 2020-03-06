<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">

    <title>PICKME</title>

    <link rel="stylesheet" href="assets/flexslider/flexslider.css" type="text/css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,900&display=swap" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/cv.css">
    <link rel="stylesheet" href="assets/css/equipe.css">
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
                    <a href="choice_inscription.php" id="create-user">Inscription</a>
                    <a href="connexion.php" id="connect-user">Connexion</a>
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
                    <li><a href="equipe.php">Team</a></li>
                    <li><a href="">Services</a></li>
                    <?php if (is_user()) { ?>
                    <li><a href="cvbuilder.php">Déposez mon CV</a></li>
                    <li><a href="profil.php">Mon profil</a></li>
                    <?php } elseif (is_recruter()) { ?>
                    <li><a href="rechercheCv.php">Trouver un profil</a></li>
                    <?php } elseif (is_admin()) { ?>
                    <li><a href="cvbuilder.php">Déposez mon CV</a></li>
                    <li><a href="Profil.php">Mon profil</a></li>

                    <li><a href="rechercheCv.php">Trouver un profil</a></li>
                    <li><a href="admin.php">Administration</a></li>



                    <?php } ?>
                </ul>
            </nav>

            <div class="connect">
                <ul>
                    <?php if (is_logged()) { ?>
                    <li id="connect-user2"><a  href="deconnexion.php" >Deconnexion</a></li>
                    <?php } else { ?>
                    <li id="create-user2"><a href="choice_inscription.php">Inscription</a></li>
                    <li id="connect-user2"><a  href="connexion.php" >Connexion</a></li>
                    <?php } ?>
                </ul>
            </div>

        </div>
        <div class="clear"></div>

</header>

