<?php
session_start();

//require_once ('Inc/verif_connexion.php');


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
//    $v = new Validation();
//    $errors = $v->validChamp($errors, $nom, 'nom', 2, 50);
//    $errors = $v->validChamp($errors, $prenom, 'prenom', 2, 20);
//    $errors = $v->validChamp($errors, $telephone, 'telephone', 2, 20);
//    $errors = $v->validChamp($errors, $entreprise, 'entreprise', 2, 30);
//    $errors = $v->validChamp($errors, $siret, 'siret', 14, 14);
//    $errors = $v->validChamp($errors, $street, 'street', 5, 100);
//    $errors = $v->validChamp($errors, $postalcode, 'postalcode', 5, 5);
//    $errors = $v->validChamp($errors, $city, 'city', 2, 40);


    if (count($errors) == 0) {
        //insert into
        //$user_id = $_SESSION['login']['id'];

        $charcv = serialize($_POST);
        $cv->insertCv($charcv);



    }

}


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
                        <td><input type="text" name="add_diplomedate[]" placeholder="Date d'obtention" class="form-control name_list" /></td>
                        <td><input type="text" name="add_lieu[]" placeholder="Etablissement" class="form-control name_list" /></td>
                        <td><input type="text" name="add_work[]" placeholder="Tâches effectuées lors de votre formation" class="form-control name_list" /></td>
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
                <pre>
                    <?php print_r($_POST) ?>
                </pre>
            </div>
        </form>
        <pre>

        </pre>
    </div>
</div>

<?php require ('Inc/footer.php');
} else {
    header('Location: 403.php');
}
?>




