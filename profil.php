<link rel="stylesheet" href="assets/css/profil.css">
<div class="wrap">
<h1 id="profilh1">Mon profil</h1>


<?php

spl_autoload_register();

use \Inc\Repository\ProfilRepository;
use \Inc\Model\ProfilModel;

$userRepository = new ProfilRepository();

$allUsers = $userRepository->getAllUser();


include ('Inc/header.php');
?>

<body class="body">

<?php
foreach($allUsers as $user) {
    $profil = new ProfilModel($user);
    echo $profil->viewProfil();
}
?>

</body>

<?php
include ('Inc/footer.php');



