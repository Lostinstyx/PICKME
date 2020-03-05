<?php
session_start();

spl_autoload_register();

include ('Inc/function/functions.php');

use \Inc\Repository\ProfilRepository;
use Inc\Model\ProfilModel;
use Inc\Service\Tools;

$request = new ProfilRepository();
$inf = new ProfilModel();
$tool = new Tools();

$users = $request->getUser();


include('Inc/header.php');

foreach ($users as $key => $user) {
    echo $inf->ProfilName($user);
    echo $inf->ProfilInformations($user);
}

include('Inc/footer.php');


