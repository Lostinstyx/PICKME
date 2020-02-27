<?php
spl_autoload_register();

use \Inc\Service\Form;
use \Inc\Service\Validation;
use \Inc\Repository\ArticleRepository;


$errors = array();

$form = new Form($errors);

if(!empty ($_POST['submitted'])) {
    //Faille XSS
    $title = trim(strip_tags($_POST['title']));
    $content = trim(strip_tags($_POST['content']));

    //validation
    $v = new Validation();
    $errors = $v->validChamp($errors, $title, 'titre', 3, 120);
    $errors = $v->validChamp($errors, $title, 'titre', 3, 500);

    if(count($errors) == 0) {
        //insert into
        $repo = new \Inc\Repository\ArticleRepository();
        $newid = $repo->insert($title, $content);


    }

}


require_once ('Inc/header.php');?>


    <form action="" method="post" style="margin-top: 100px">
        <?= $form->label('choicecandidat', 'Candidat'); ?>
        <?= $form->radio('typeregister', 'choicecandidat') ?>
        <?= $form->label('choicerecruteur', 'Recruteur'); ?>
        <?= $form->radio('typeregister', 'choicerecruteur') ?>


        <?= $form->error('title'); ?>

        <div id="show"></div>
        <?= $form->submit(); ?>
    </form>

<form id="form-recruteur" action="" method="post">
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

    <?= $form->label('password', 'Mot de passe'); ?>
    <?= $form->input('password','password'); ?>
</form>

    <form id="form-candidat" action="" method="post">
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

        <?= $form->label('password', 'Mot de passe'); ?>
        <?= $form->input('password','password'); ?>
    </form>



<?php require_once ('Inc/footer.php');