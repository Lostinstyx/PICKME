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
        <?= $form->input('typeregister', 'radio') ?>
        <?= $form->label('choicerecruteur', 'Recruteur'); ?>
        <?= $form->input('typeregister', 'radio') ?>
        <?= $form->label('prenom', 'Prenom'); ?>
        <?= $form->input('prenom','text'); ?>
        <?= $form->label('nom', 'Prenom'); ?>
        <?= $form->input('nom','text'); ?>

        <?= $form->error('title'); ?>

        <div id="show"></div>
        <?= $form->submit(); ?>
    </form>



<?php require_once ('Inc/footer.php');