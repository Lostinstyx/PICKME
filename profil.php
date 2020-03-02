<link rel="stylesheet" href="assets/css/profil.css">

<h1 id="profilh1">Mon profil</h1>


<?php

spl_autoload_register();

use \Inc\Service\pdo;
use \Inc\Repository\ProfilRepository;
use \Inc\Model\ProfilModel;

$userRepository = new ProfilRepository();

$allUsers = $userRepository->getAllUser();

foreach($allUsers as $user) {
    $profil = new ProfilModel($user);
    echo $profil->viewProfil();
}







