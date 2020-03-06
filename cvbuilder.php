<?php
session_start();

include ('Inc/function/functions.php');


spl_autoload_register();

use \Inc\Service\Form;
use \Inc\Service\Validation;
use \Inc\Repository\ArticleRepository;

$cv = new \Inc\Repository\CvRepository();


if(!empty($_SESSION)) {

$errors = array();

$form = new Form($errors);

if (!empty ($_POST['submit'])) {
    //Faille XSS

    foreach ($_POST['add_formation'] as $diplomes => $value) {
        $diplometitle = trim(strip_tags($value));
    }
    foreach ($_POST['add_diplomedate'] as $diplomes => $value) {
        $diplomedate = trim(strip_tags($value));
    }
    foreach ($_POST['add_lieu'] as $diplomes => $value) {
        $diplomeplace = trim(strip_tags($value));
    }
    foreach ($_POST['add_work'] as $diplomes => $value) {
        $diplomework = trim(strip_tags($value));
    }
    foreach ($_POST['add_post'] as $diplomes => $value) {
        $xppost = trim(strip_tags($value));
    }
    foreach ($_POST['add_entreprise'] as $diplomes => $value) {
        $xpentreprise = trim(strip_tags($value));
    }
    foreach ($_POST['add_place'] as $diplomes => $value) {
        $xpplace = trim(strip_tags($value));
    }
    foreach ($_POST['add_taches'] as $diplomes => $value) {
        $xptaches = trim(strip_tags($value));
    }
    foreach ($_POST['add_time'] as $diplomes => $value) {
        $xptime = trim(strip_tags($value));
    }


    //validation
    $v = new Validation();
    $errors = $v->validChamp($errors, $diplometitle, 'add_formation', 5, 50);
    $errors = $v->validChamp($errors, $diplomedate, 'add_diplomedate', 2, 20);
    $errors = $v->validChamp($errors, $diplomeplace, 'add_lieu', 2, 20);
    $errors = $v->validChamp($errors, $diplomework, 'add_work', 2, 30);
    $errors = $v->validChamp($errors, $xppost, 'add_post', 14, 14);
    $errors = $v->validChamp($errors, $xpentreprise, 'add_entreprise', 5, 100);
    $errors = $v->validChamp($errors, $xpplace, 'add_place', 5, 5);
    $errors = $v->validChamp($errors, $xptime, 'add_time', 2, 40);


    if (count($errors) == 0) {
        //insert into
        $charcv = serialize($_POST);
        $cv->insertCv($charcv);
    }

}
    $form = new Form($errors);

require ('Inc/header.php');?>

<div class="container" style="margin-top: 50px">
    <br />
    <br />
    <h2 align="center">Construisez votre CV</h2>
    <div class="form-group">
        <form name="add_formation" id="add_formation" method="post">
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><h3 align="center">Vos Formations</h3></td>
                    </tr>
                    <tr id="row'+i+'">
                        <td><input type="text" name="add_formation[]" placeholder="Intitulé du diplôme" class="form-control name_list" /></td>
                        <?php echo $form->error('add_formation[]'); ?>
                        <td><input type="text" name="add_diplomedate[]" placeholder="Date d'obtention" class="form-control name_list" /></td>
                        <?php echo $form->error('add_diplomedate[]') ?>
                        <td><input type="text" name="add_lieu[]" placeholder="Etablissement" class="form-control name_list" /></td>
                        <?php echo $form->error('add_lieu[]') ?>
                        <td><input type="text" name="add_work[]" placeholder="Tâches effectuées lors de votre formation" class="form-control name_list" /></td>
                        <?php echo $form->error('add_work[]') ?>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <table class="table table-bordered" id="dynamic_field_xp">
                    <tr>
                        <td><h3 align="center">Vos expériences pro</h3></td></tr>
                    <tr id="row'+i+'"><td><input type="text" name="add_post[]" placeholder="Intitulé du poste" class="form-control name_list" /></td>
                        <td><input type="text" name="add_entreprise[]" placeholder="Entreprise" class="form-control name_list" /></td>
                        <td><input type="text" name="add_place[]" placeholder="Lieu" class="form-control name_list" /></td>
                        <td><input type="text" name="add_taches[]" placeholder="Description des tâches effectués" class="form-control name_list" /></td>
                        <td><input type="text" name="add_time[]" placeholder="Période" class="form-control name_list" /></td>
                        <td><button type="button" name="add_xp" id="add_xp" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
            </div>
        </form>
        <pre>

        </pre>
    </div>
</div>

<?php require ('Inc/footer.php');
} else {
    header('Location: connexion.php');
}
?>




