<?php
spl_autoload_register();

use \Inc\Service\Form;
use \Inc\Service\Validation;
use \Inc\Repository\ArticleRepository;


$errors = array();

$form = new Form($errors);

if(!empty ($_POST['submitted'])) {
    //Faille XSS
    $prenom = trim(strip_tags($_POST['prenom']));
    $nom = trim(strip_tags($_POST['nom']));
    $email = trim(strip_tags($_POST['email']));
    $telephone = trim(strip_tags($_POST['telephone']));
    $entreprise = trim(strip_tags($_POST['entreprise']));
    $siret = trim(strip_tags($_POST['siret']));
    $street = trim(strip_tags($_POST['street']));
    $postalcode = trim(strip_tags($_POST['postalcode']));
    $city = trim(strip_tags($_POST['city']));
    $password1 = trim(strip_tags($_POST['password1']));
    $password2 = trim(strip_tags($_POST['password2']));


    //validation
    $v = new Validation();
    $errors = $v->validChamp($errors, $nom, 'nom', 2, 50);
    $errors = $v->validChamp($errors, $prenom, 'prenom', 2, 20);
    $errors = $v->validChamp($errors, $telephone, 'telephone', 2, 20);
    $errors = $v->validChamp($errors, $entreprise, 'entreprise', 2, 30);
    $errors = $v->validChamp($errors, $siret, 'siret', 14, 14);
    $errors = $v->validChamp($errors, $street, 'street', 5, 100);
    $errors = $v->validChamp($errors, $postalcode, 'postalcode', 5, 5);
    $errors = $v->validChamp($errors, $city, 'city', 2, 40);

    $errors = $v->validPassword($errors, $password1, $password2, 'password');
    $errors = $v->validMail($errors, $email, 'email');

    if(count($errors) == 0) {
        //insert into
        die('OK MA COUILLE');
        //$repo = new \Inc\Repository\ArticleRepository();
        //  $newid = $repo->insert($title, $content);


    }

}


require_once ('Inc/header.php');?>


    <form class="searchCV" action="" method="post" style="margin-top: 100px">
        <?= $form->label('choicecandidat', 'Candidat'); ?>
        <?= $form->radio('typeregister', 'choicecandidat') ?>
        <?= $form->label('choicerecruteur', 'Recruteur'); ?>
        <?= $form->radio('typeregister', 'choicerecruteur') ?>

<div id="dialog-form" title="Inscription">
    <p class="validateTips">Les champs doivent tous être remplis..</p>

        <?= $form->error('title'); ?>
    </form>

    <form class="searchCV" id="form-recruteur" action="" method="post">
        <?= $form->label('prenom', 'Prenom'); ?>
        <?= $form->input('prenom','text'); ?>

        <?= $form->label('nom', 'Nom'); ?>
        <?= $form->input('nom','text'); ?>

        <?= $form->label('email', 'Email'); ?>
        <?= $form->input('email','email'); ?>

        <?= $form->label('telephone', 'telephone'); ?>
        <?= $form->input('telephone','text'); ?>

        <?= $form->label('entreprise', 'Entreprise'); ?>
        <?= $form->input('entreprise','text'); ?>

        <?= $form->label('street', 'Adresse'); ?>
        <?= $form->input('street','text'); ?>

        <?= $form->label('postalcode', 'Code Postal'); ?>
        <?= $form->input('postalcode','text'); ?>

        <?= $form->label('city', 'Ville'); ?>
        <?= $form->input('city','text'); ?>

        <?= $form->label('siret', 'N° de Siret'); ?>
        <?= $form->input('siret','text'); ?>

        <?= $form->label('password1', 'Mot de passe'); ?>
        <?= $form->input('password1','password'); ?>

        <?= $form->label('password2', 'Valider votre mot de passe'); ?>
        <?= $form->input('password2','password'); ?>

        <?= $form->submit(); ?>
    </form>

    <form class="searchCV" id="form-candidat" action="" method="post">
        <?= $form->label('prenom', 'Prenom'); ?>
        <?= $form->input('prenom','text'); ?>

        <?= $form->label('nom', 'Nom'); ?>
        <?= $form->input('nom','text'); ?>

        <?= $form->label('email', 'Email'); ?>
        <?= $form->input('email','email'); ?>

        <?= $form->label('telephone', 'telephone'); ?>
        <?= $form->input('telephone','text'); ?>

        <?= $form->label('street', 'Adresse'); ?>
        <?= $form->input('street','text'); ?>

        <?= $form->label('postalcode', 'Code Postal'); ?>
        <?= $form->input('postalcode','text'); ?>

        <?= $form->label('city', 'Ville'); ?>
        <?= $form->input('city','text'); ?>

        <?= $form->label('password1', 'Mot de passe'); ?>
        <?= $form->input('password1','password'); ?>

        <?= $form->label('password2', 'Valider votre mot de passe'); ?>
        <?= $form->input('password2','password'); ?>

        <?= $form->submit(); ?>
    </form>



<?php require_once ('Inc/footer.php');