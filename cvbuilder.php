<?php
session_start();
require_once ('Inc/verif_connexion.php');
require ('Inc/header.php');?>

<div class="container" style="margin-top: 50px">
    <br />
    <br />
    <h2 align="center">Construisez votre CV</h2>
    <div class="form-group">
        <form name="add_name" id="add_name">
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <!--								<td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>-->
                        <td><h3 align="center">Vos Formations</h3></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <div class="form-group">
        <form name="add_name" id="add_name">
            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field_xp">
                    <tr>
                        <!--								<td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>-->
                        <td><h3 align="center">Vos expériences pro</h3></td>
                        <td><button type="button" name="add_xp" id="add_xp" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />
            </div>
        </form>
    </div>
</div>

<?php require ('Inc/footer.php');?>




