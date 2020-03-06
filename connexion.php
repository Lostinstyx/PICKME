<?php
session_start();

include ('Inc/function/functions.php');

spl_autoload_register();

use Inc\Repository\ArticleRepository;
use Inc\Service\Validation;


$request = new ArticleRepository();
$verif = new Validation();

$errors = array();

if(!empty($_POST['submitted'])) {

    $login = trim(strip_tags($_POST['login']));
    $password = trim(strip_tags($_POST['password']));

    $errors = $verif->VerifMail($errors,$login,'login');

    if (count($errors) === 0) {

        $user = $request->getUserConnexion($login);

        if (!empty($user)) {

            if(password_verify($password, $user['password'])) {

                $request->InitializeSession($user,'index.php');

            } else {
                return $errors = 'Email, où mot de passe non valide';
            }
        } else {
            return $errors = "Email, où mot de passe non valide";
        }
    }
}

require_once ('Inc/header.php');?>

<h2 class="login_title">Qui êtes-vous ?</h2>

<div class="barre"></div>
<div class="login">
    <form class="searchCVC" action="" method="post">
        <div class="login">
            <label for="mail"></label>
            <input type="text" name="login" id="login" placeholder="Votre mail" value="<?php if (!empty
            ($_POST['login'])) {echo $_POST['login'];} ?>">
        </div>
        <div class="password">
            <label for="password"></label>
            <input type="password" name="password" id="password_log" placeholder="Votre mot de passe">
        </div>
        <p class="errors"><?php if(!empty($errors['login'])) { echo $errors['login']; } ?></p>
        <input id="submit_log" type="submit" name="submitted" value="Login">

        <div class="forgot">
            <a id="forgot_link" href="forgot_password.php">Mot de passe oublié ?</a>
        </div>

    </form>


</div>

<?php require_once ('Inc/footer.php'); ?>