<?php
include_once 'Inc/header.php'; ?>
<?php spl_autoload_register();

use \Inc\Model\ContactModel;
use \Inc\Repository\ContactRepository;
use \Inc\Service\Tools;
use \Inc\Service\Form;
use \Inc\Service\Validation;

$errors = array();
?>
    <div class="before">
        <img src="assets/img/espace-coworking-3.jpg" alt="notre bureau">
        <span class="big_titre">Contactez-nous</span>
        <div class="ligne"></div>
    </div>
    <section class="container_truc">
        <div class="wrapper">
            <div class="block block_1">
                <h2 class="titre">Vous souhaitez nous contacter? <br> Nous serons ravis d'avoir vos retours</h2>
                <div class="line_block"></div>
                <div class="par">
                    <p class="par1">Lorem ipsum – dolor quis ex mattis, euismod <br> mauris eget, scelerisque sapien.</p>
                    <p>Quisque semper malesuada ipsum! <br> Curabitur et mattis ante. Maecenas sit amet <br>commodo tellus.
                    </p>
                </div>
            </div>
            <div class="block block_2">
                <div class="call">
                    <img src="https://img.icons8.com/cute-clipart/64/000000/phone.png" alt="phone_icon">
                    <p class="text">Nous contacter</p>
                    <p class="text-phone">06.66.66.66.66</p>
                </div>
                <div class="hours">
                    <img src="https://img.icons8.com/cotton/64/000000/clock--v1.png" alt="horloge_icon">
                    <p class="opening">Nos horaires d'ouverture</p>
                    <p class="opening_hours">Du lundi au vendredi de 9 à 19h <br> Le samedi de 9h à 17h. Fermeture le
                        dimanche</p>
                </div>
                <div class="email">
                    <img src="https://img.icons8.com/wired/64/000000/email.png" alt="mail_icon">
                    <p class="mel">Notre email</p>
                    <p class="mail">contact@pickme.fr</p>
                </div>
            </div>
            <div class="block block_3">
                <div class="form">
                        <?php
                        $tools = new Tools();
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            //Faille XSS
                            $objet = trim(strip_tags($_POST['objet']));
                            $email = trim(strip_tags($_POST['email']));
                            $content = trim(strip_tags($_POST['content']));

                            $validation = new Validation();
                            $errors = $validation->validChamp($errors, $_POST['objet'], 'objet', 3, 100);
                            $errors = $validation->VerifMail($errors, $_POST['email'] ,'email');
                            $errors = $validation->validChamp($errors, $_POST['content'], 'content', 1, 15);

                            if (count($errors) ==0){
                                echo '<p class="message">Votre message à bien été envoyé </p>';
                                $tableau = new ContactRepository();
                                $tableau->insertContact($_POST['email'], $_POST['objet'], $_POST['content']);
                            }
                        }
                        ?>
                    <form method="post" action="#">
                        <?php
                        $form = new Form($errors);
                        $html = $form->label('objet', 'Objet');
                        $html .= $form->input('objet', 'text');
                        $html .= $form->error('objet');
                        $html .= $form->label('email', 'Votre email');
                        $html .= $form->input('email', 'email');
                        $html .= $form->error('email');
                        $html .= $form->label('content', 'Votre message');
                        $html .= $form->textarea('content');
                        $html .= $form->submit('submitted');
                        print $html;
//                        $tools->debug($form);
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </section>
<?php include_once 'Inc/footer.php';