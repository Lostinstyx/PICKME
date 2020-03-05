<?php
session_start();

spl_autoload_register();

use \Inc\Service\Form;
use \Inc\Service\Validation;
use \Inc\Repository\ArticleRepository;

$request = new ArticleRepository();
$errors = array();

if(!empty ($_POST['submitted'])) {


    $nom = trim(strip_tags($_POST['nom']));
    $prenom = trim(strip_tags($_POST['prenom']));
    $email = trim(strip_tags($_POST['email']));
    $telephone = trim(strip_tags($_POST['telephone']));
    $street = trim(strip_tags($_POST['street']));
    $postalcode = trim(strip_tags($_POST['postalcode']));
    $city = trim(strip_tags($_POST['city']));
    $password1 = trim(strip_tags($_POST['password1']));
    $password2 = trim(strip_tags($_POST['password2']));



    $v = new Validation();
    $errors = $v->validChamp($errors, $nom, 'nom', 2, 50);
    $errors = $v->validChamp($errors, $prenom, 'prenom', 2, 20);
    $errors = $v->validChamp($errors, $telephone, 'telephone', 2, 20);
    $errors = $v->validChamp($errors, $street, 'street', 5, 100);
    $errors = $v->validChamp($errors, $postalcode, 'postalcode', 5, 5);
    $errors = $v->validChamp($errors, $city, 'city', 2, 40);

    $errors = $v->validPassword($errors, $password1, $password2, 'password1');
    $errors = $v->verifMail($errors, $email, 'email');

    if(count($errors) == 0) {
        $request->insertUser($prenom, $nom, $email ,$telephone ,$street, $postalcode, $city, $password1);

        header('Location: admin.php');
    }

}



$form = new Form($errors);

include "admin_header.php";?>

<div id="form-inscription" class="form">
    <form class="form-bo" action="#" class="signup" method="post">
        <?= $form->label('prenom', 'Prenom'); ?>
        <?= $form->input('prenom','text'); ?>
        <?= $form->error('prenom'); ?>

        <?= $form->label('nom', 'Nom'); ?>
        <?= $form->input('nom','text'); ?>
        <?= $form->error('nom'); ?>

        <?= $form->label('email', 'Email'); ?>
        <?= $form->input('email','email'); ?>
        <?= $form->error('email'); ?>

        <?= $form->label('telephone', 'telephone'); ?>
        <?= $form->input('telephone','text'); ?>
        <?= $form->error('telephone'); ?>

        <?= $form->label('street', 'Adresse'); ?>
        <?= $form->input('street','text'); ?>
        <?= $form->error('street'); ?>

        <?= $form->label('postalcode', 'Code Postal'); ?>
        <?= $form->input('postalcode','text'); ?>
        <?= $form->error('postalcode'); ?>

        <?= $form->label('city', 'Ville'); ?>
        <?= $form->input('city','text'); ?>
        <?= $form->error('city'); ?>

        <?= $form->label('password1', 'Mot de passe'); ?>
        <?= $form->input('password1','password'); ?>
        <?= $form->error('password1'); ?>

        <?= $form->label('password2', 'Valider votre mot de passe'); ?>
        <?= $form->input('password2','password'); ?>
        <?= $form->error('password2'); ?>

        <p class="need">* Champs obligatoires</p>
        <input id="submit_signup" type="submit" name="submitted" value="Envoyer">
    </form>

<?php include "admin_footer.php";

