<?php


use Inc\Model\CvModel;
use Inc\Repository\ResearchCvRepository;

require_once('Inc/header.php');
require ('Inc/function/debug.php');
require ('Inc/Model/CvModel.php');
require ('Inc/Repository/ResearchCvRepository.php');

?>



        <h1 class="titleCV">Rechercher un CV</h1>
        <div class="wrap_section">
        <form class="searchCV" name="searchCv" method="get" action="rechercheCv.php">

            <label for="categorie_select">Choisir catégorie</label>
            <select name="categorie" id="categorie_select">
                <option value="">-Catégories-</option>
                <option value="">------------------A----------------------</option>
                <option value="aeroEtEspace">Aéronautique Et Espace</option>
                <option value="agri">Agriculture - Agroalimentaire</option>
                <option value="artisanat">Artisanat</option>
                <option value="audiovisuel">Audiovisuel, Cinéma</option>
                <option value="comptabilité">Audit, Comptabilité, Gestion</option>
                <option value="automobile">Automobile</option>
                <option value="">------------------B----------------------</option>
                <option value="banque">Banque, Assurance</option>
                <option value="batiment">Bâtiment, Travaux Publics</option>
                <option value="biologie">Biologie, Chimie, Pharmacie</option>
                <option value="">------------------C----------------------</option>
                <option value="commerce">Commerce, Distribution</option>
                <option value="communication">Communication</option>
                <option value="creation">Création, Métiers D'art</option>
                <option value="culture">Culture, Patrimoine</option>
                <option value="">------------------D----------------------</option>
                <option value="defense">Défense, Sécurité, Armée</option>
                <option value="documentation">Documentation, Bibliothèque</option>
                <option value="droit">Droit</option>
                <option value="">------------------E----------------------</option>
                <option value="edition">Edition, Livre</option>
                <option value="enseignement">Enseignement</option>
                <option value="environnement">Environnement</option>
                <option value="">------------------F----------------------</option>
                <option value="ferroviaire">Ferroviaire</option>
                <option value="foires">Foires, Salons Et Congrès</option>
                <option value="fonctionPublique">Fonction Publique</option>
                <option value="">------------------H----------------------</option>
                <option value="hotellerie">Hôtellerie, Restauration</option>
                <option value="humanitaire">Humanitaire</option>
                <option value="">------------------I----------------------</option>
                <option value="immobilier">Immobilier</option>
                <option value="industrie">Industrie</option>
                <option value="informatique">Informatique, Télécoms, Web</option>
                <option value="">------------------J----------------------</option>
                <option value="journalisme">Journalisme</option>
                <option value="">------------------L----------------------</option>
                <option value="langues">Langues</option>
                <option value="">------------------M----------------------</option>
                <option value="marketing">Marketing, Publicité</option>
                <option value="medical">Médical</option>
                <option value="mode">Mode-Textile</option>
                <option value="">------------------P----------------------</option>
                <option value="paramedical">Paramédical</option>
                <option value="proprete">Propreté Et Services Associés</option>
                <option value="psychologie">Psychologie</option>
                <option value="">------------------R----------------------</option>
                <option value="ressourcesHumaines">Ressources Humaines</option>
                <option value="">------------------S----------------------</option>
                <option value="siencesHumaines">Sciences Humaines Et Sociales</option>
                <option value="secretariat">Secrétariat</option>
                <option value="social">Social</option>
                <option value="spectacle">Spectacle - Métiers De La Scène</option>
                <option value="sport">Sport</option>
                <option value="">------------------T----------------------</option>
                <option value="tourisme">Tourisme</option>
                <option value="transport">Transport-Logistique</option>
            </select>

                <label for="niveau_select">Choisir un niveau : </label>
                <select name="niveau" id="niveau_select">
                    <option value="">-niveau-</option>
                    <option value="aucun">Aucun</option>
                    <option value="cap">CAP, BEP</option>
                    <option value="baccalaureat">Baccalauréat</option>
                    <option value="bts">DEUG, BTS, DUT, DEUST</option>
                    <option value="licence">Licence, licence professionnelle</option>
                    <option value="master">Maîtrise, master 1</option>
                    <option value="ingenieur">Master, diplôme d'études approfondies, diplôme d'études supérieures spécialisées, diplôme d'ingénieur</option>
                    <option value="doctorat">Doctorat, habilitation à diriger des recherches</option>
                </select>


            <label for="experience_select">Choisir un nombre d'année d'expérience : </label>
            <select name="experience" id="experience_select">
                <option value="">-Expérience-</option>
                <option value="aucune">Aucune</option>
                <option value="junior">Entre 1 et 3 ans </option>
                <option value="confirme">Entre 4 et 10</option>
                <option value="senior">Plus de 10 ans</option>
            </select>


            <label for="rechercheMetier">Choisir un métier : </label>
            <input type="text" name="rechercheMetier" id="rechercheMetier" placeholder="métier">
            <input type="submit" name="submitted" value="Rechercher">
        </form>

            <hr />

            <div class="listeCv">
                <?php

                if(!empty($_GET['submitted'])) {

                    $cvModel = new CvModel();
                    $repo = new ResearchCvRepository();
                    $searches = $repo->getCvByCategorie($_GET['categorie']); //OR $repo->getCvByCategorie($_GET['niveau']) OR $repo->getCvByCategorie($_GET['experience']);
                    $searches = $repo->getCvByNiveau($_GET['niveau']);
                    $searches = $repo->getCvByExperience($_GET['experience']);
                    foreach ($searches as $search)
                    {
                        echo $search->viewCv();
                    }



                }




                else {
                    $cvModel = new CvModel();
                    $repo = new ResearchCvRepository();
                    $searches = $repo->getAllcvs();

                    foreach ($searches as $search) {
                        echo $search->viewCv();

                    }
                }
                ?>





            </div>





        </div>






<?php require_once('Inc/footer.php');


