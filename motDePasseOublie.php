<?php

spl_autoload_register();

//use \Inc\Service\Tools;
use \Inc\Service\Validation;
use \Inc\Service\Form;
use \Inc\Repository\ArticleRepository;

$errors = array();
$success = false;

require_once 'Inc/function/functions.php';
include_once 'Inc/header.php';
?>

<div class="block block_3">

<h2 class="login_title">Mot de passe oublié?</h2>
<div class="barre"></div>

<div class="form">
    <?php
    //    $tools = new Tools();
    $verif = new ArticleRepository();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['submitted']) {
            // failles XSS
            $email = trim(strip_tags($_POST['email']));
            //validChamps
            $valid = new Validation();
            $errors = $valid->VerifMail($errors, $email, 'email');
            $user = $verif->emailExist($email);
            if (!empty ($user)){
                    $token = $user['token'];
                    $email = urlencode($email);
                    $html = '<a href="modif-password.php?token='.$token.'&email='.$email.'">C\'est ici</a>';
                    echo $html;
                } else {
                    $errors['email'] = 'Erreur veuillez rentrer un mail valide !';
                }
                return '<p>Ca marche pas mdr</p>';
            }
    }
    ?>
    <form method="post" class="searchCVC" action="#">
        <div class="login">
            <?php
            $pass = new Form($errors, 'post');
            $html = $pass->label('email', 'Votre email');
            $html .= $pass->input('email', 'email');
            $html .= $pass->error('email'); ?>
        </div>
        <?php
        $html .= $pass->submit('submitted');
        print $html; ?>
    </form>
</div>


<?php include_once 'Inc/footer.php'; ?>
