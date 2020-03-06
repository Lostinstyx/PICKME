<?php

spl_autoload_register();

//use \Inc\Service\Tools;
use \Inc\Service\Validation;
use \Inc\Service\Form;
use \Inc\Repository\ArticleRepository;

$errors = array();
$success = false;

if (!empty($_GET['token']) && !empty($_GET['email'])) {
    // failles XSS
    $verif = new ArticleRepository();
    $token = trim(strip_tags($_GET['token']));
    $email = trim(strip_tags($_GET['email']));
    $email = urldecode($email);
    if (!empty($verif->tokenVerif($email, $token))) {
        $v = new Validation();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['submitted']) {
                $pass1 = trim(strip_tags($_POST['pass1']));
                $pass2 = trim(strip_tags($_POST['pass2']));
                $errors = $v->validPassword($errors, $pass1, $pass2, 'pass1');
                if (count($errors) == 0) {
                    $verif->updatePass($pass2, $email);
                    header('Location: index.php');
                }
            }
        }
    } else {
        die ('404');
    }
} else {
    die ('404');
}
require_once 'Inc/function/functions.php';
include_once 'Inc/header.php';

?>

<div class="block block_3">

    <h2 class="login_title">Modifiez votre mot de passe !</h2>
    <div class="barre"></div>
    <div class="form">
        <form method="post" class="searchCVC" action="#">
            <?php
            $pass = new Form($errors, 'post');
            $html = $pass->label('pass1', 'Mot de passe');
            $html .= $pass->input('pass1', 'password');
            $html .= $pass->error('pass1'); ?>

            <?php
            $html .= $pass->label('pass2', 'Valider votre mot de passe');
            $html .= $pass->input('pass2', 'password');
            $html .= $pass->error('pass2'); ?>

            <?php
            $html .= $pass->submit('submitted');
            print $html; ?>
        </form>
    </div>
</div>