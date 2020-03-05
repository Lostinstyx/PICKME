<?php
spl_autoload_register();

use \Inc\Service\Tools;
use \Inc\Service\Validation;
use \Inc\Service\Form;
use \Inc\Repository\ArticleRepository;

$errors = array();
$success = false;

include_once 'Inc/header.php'; ?>
<div class="block block_3"

<h2 class="login_title">Mot de passe oublié?</h2>
<div class="barre"></div>

<div class="form">
    <?php
    $tools = new Tools();
    $verif = new ArticleRepository();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['submitted']) {
            // failles XSS
            $email = trim(strip_tags($_POST['email']));
            $pass1 = trim(strip_tags($_POST['pass1']));
            $pass2 = trim(strip_tags($_POST['pass2']));

            //validChamps
            $valid = new Validation();
            $errors = $valid->VerifMail($errors, $email, 'email');
            $errors = $valid->validPassword($errors, $pass1, $pass2, 'pass1');

            if ($verif->emailExist($_POST['email'])) {
                if (count($errors) == 0) {
                    $verif->updatePass($pass1);
                    ?>
                    <p class="pass_success">Votre mot de passe à bien été modifié</p>
                    <?php
                } else {
                    echo "<p class='pass_abort'>Impossible de modifier votre mot de passe</p>";
                }
            }
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
        <div class="password">
            <?php
            $html .= $pass->label('pass1', 'Mot de passe');
            $html .= $pass->input('pass1', 'password');
            $html .= $pass->error('pass1'); ?>

            <?php
            $html .= $pass->label('pass2', 'Valider votre mot de passe');
            $html .= $pass->input('pass2', 'password');
            $html .= $pass->error('pass2'); ?>
        </div>
        <?php
        $html .= $pass->submit('submitted');
        print $html; ?>
    </form>
</div>
</div>


<?php include_once 'Inc/footer.php'; ?>
