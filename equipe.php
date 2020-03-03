<?php
session_start();

require_once ('Inc/function/functions.php');
include('inc/header.php'); ?>


    <link rel="stylesheet" href="assets/css/equipe.css">
<div class="wrappy">
    <div class="equipe">

        <div class="txtequipe">
            <h1>L'équipe de Pick me</h1>
            <img id="logeq" src="assets/img/vectoheripm.png">
            <p>Chez Pick me, toute notre équipe est mobilisée pour faciliter votre route vers le succès!</p>
        </div>

        <div class="facesequipe">
            <div class="faces">
                <img src="assets/img/avatarxandre.png" alt="Alexandre">
                <h3>Alexandre</h3>
                <p>Développeur Web Chef</p>
            </div>
            <div class="faces">
                <img src="assets/img/avatarpierre.png" alt="Pierre">
                <h3>Pierre</h3>
                <p>Développeur Web Chef Adjoint</p>
            </div>
            <div class="faces">
                <img src="assets/img/avatarmoi.png" alt="Melanie">
                <h3>Mélanie</h3>
                <p>Développeuse Web</p>
            </div>
            <div class="faces">
                <img src="assets/img/avatarsamuel.png" alt="Samuel">
                <h3>Samuel</h3>
                <p>Développeur Web</p>
            </div>
            <div class="faces">
                <img src="assets/img/avatarvictor.png" alt="Victor">
                <h3>Victor</h3>
                <p>Développeur Web</p>
            </div>
        </div>

    </div>
</div>

<?php include('inc/footer.php'); ?>