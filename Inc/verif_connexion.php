<?php


spl_autoload_register();

use \Inc\Service\Form;
use \Inc\Service\Validation;
use \Inc\Repository\ArticleRepository;
use \Inc\Service\Tools;

$tool = new Tools();

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
            echo $errors = ' va te faire';
        }
    }
}