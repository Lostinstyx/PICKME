<?php
session_start();
require 'Inc/verif_connexion.php';
require 'Inc/header.php' ?>
<label class="button-toggle-wrap">
    <p class="text-form">Choisissez votre rôle :</p>
    <input class="toggler" type="checkbox" data-toggle="button-toggle"/>
    <div class="button-toggle">
        <div class="handle">
            <div class="bars"></div>
        </div>
    </div>
</label>
<div class="spacer"></div>
<?php require 'Inc/footer.php' ?>