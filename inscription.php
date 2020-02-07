<?php
?>













<div id="dialog-form" title="Inscription">
    <p class="validateTips">Les champs doivent tous être remplis..</p>

    <form>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" value="" placeholder="Nom..."
               class="text ui-widget-content ui-corner-all"/>
        <label for="prenom">Prenom :</label>
        <input type="text" name="prenom" id="prenom" value="" placeholder="Prenom..."
               class="text ui-widget-content ui-corner-all"/>
        <label for="email">Email :</label>
        <input type="text" name="email" id="email" value="" placeholder="Email..."
               class="text ui-widget-content ui-corner-all"/>

        <label class="radioLine" for="recruteur">Recruteur :</label>
        <input type="radio" id="recruteur" name="role" value="recruteur"/>


        <label class="radioLine" for="candidat">Candidat :</label>
        <input type="radio" id="candidat" name="role" value="candidat"/>



        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" id="mdp" value="" placeholder="Mot de passe..."
               class="text ui-widget-content ui-corner-all"/>

        <!-- Allow form submission with keyboard without duplicating the dialog button -->
        <input type="submit" tabindex="-1" style="position:absolute; top:-1000px;">

    </form>
</div>




