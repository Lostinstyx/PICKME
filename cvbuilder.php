<?php
session_start();
require_once ('Inc/verif_connexion.php');
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
                    <tr id="row'+i+'"><td><input type="text" name="add_formationn[]" placeholder="Ajouter une formation" class="form-control name_list" /></td>
                        <td><input type="text" name="add_diplome[]" placeholder="Intitulé du diplôme" class="form-control name_list" /></td>
                        <td><input type="text" name="add_lieu[]" placeholder="Etablissement" class="form-control name_list" /></td>
                        <td><input type="text" name="add_work[]" placeholder="Tâches effectuées lors de votre formation" class="form-control name_list" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <table class="table table-bordered" id="dynamic_field_xp">
                    <tr>
                        <td><h3 align="center">Vos expériences pro</h3></td></tr>
                    <tr id="row'+i+'"><td><input type="text" name="add_xpe[]" placeholder="Ajouter une expérience" class="form-control name_list" /></td>
                        <td><input type="text" name="add_post[]" placeholder="Intitulé du poste" class="form-control name_list" /></td>
                        <td><input type="text" name="add_entreprise[]" placeholder="Entreprise" class="form-control name_list" /></td>
                        <td><input type="text" name="add_place[]" placeholder="Lieu" class="form-control name_list" /></td>
                        <td><input type="text" name="add_taches[]" placeholder="Description des tâches effectués" class="form-control name_list" /></td>
                        <td><input type="text" name="add_time[]" placeholder="Période" class="form-control name_list" /></td>
                        <td><button type="button" name="add_xp" id="add_xp" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                <pre>
                <?php print_r($_POST);

                ?>
                </pre>
            </div>
        </form>
        <pre>

        </pre>
    </div>
</div>

<?php require ('Inc/footer.php');?>




