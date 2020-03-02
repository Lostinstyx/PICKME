<link rel="stylesheet" href="assets/css/profil.css">

<h1 id="profilh1">Mon profil</h1>

<?php

include('inc/pdo.php');
include('inc/function/debug.php');

$title = 'cv';
$sql = "SELECT * FROM cv";
$query = $pdo->prepare($sql);
$query->execute();
$cv = $query->fetchAll();
//debug($cv);

foreach ($cv as $key => $donnees) {
    echo $donnees;
}

?>
<h2 id="profilh2">Mon CV</h2>
<table id="profiltable">
    <tr>
        <td>id: <?php echo $donnees['id'];?></td>
    </tr>
    <tr>
        <td>Catégorie: <?php echo $donnees['category'];?></td>
    </tr>
    <tr>
        <td>Etudes: <?php echo $donnees['study'];?></td>
    </tr>
    <tr>
        <td>Experience: <?php echo $donnees['experience'];?></td>
    </tr>
    <tr>
        <td>Métier: <?php echo $donnees['work'];?></td>
    </tr>
    <tr>
        <td>Intitulé Formation 1: <?php echo $donnees['title_formation1'];?></td>
        <td>Formation 1: <?php echo $donnees['formation1'];?></td>
        <td>Intitulé Formation 2: <?php echo $donnees['title_formation2'];?></td>
        <td>Formation 2: <?php echo $donnees['formation2'];?></td>
    </tr>
    <tr>
        <td>Intitulé Expérience 1: <?php echo $donnees['title_experience1'];?></td>
        <td>Expérience 1: <?php echo $donnees['experience1'];?></td>
        <td>Intitulé Expérience 2: <?php echo $donnees['title_experience2'];?></td>
        <td>Expérience 2: <?php echo $donnees['experience2'];?></td>
    </tr>
    <tr>
        <td>Informations complémentaires: <?php echo $donnees['informations'];?></td>
    </tr>

</table>

