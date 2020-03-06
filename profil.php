<?php
session_start();

spl_autoload_register();

include('Inc/function/functions.php');


use \Inc\Repository\ProfilRepository;
use Inc\Model\ProfilModel;
use Inc\Service\Tools;
use Inc\Repository\CvRepository;
use Inc\Model\CvModel;
use Inc\Repository\StatusRepository;

$logged = new StatusRepository();
$tool = new Tools();


$request = new ProfilRepository();
$cvrequest = new CvRepository();
$inf = new ProfilModel();
$infcv = new CvModel();


$users = $request->getUser();
$cvs = $cvrequest->getUserCv();


include('Inc/header.php');

if ($logged::is_logged()) {


    foreach ($users as $key => $user) {
        foreach ($cvs as $depth => $cv) {

            echo $inf->ProfilName($user);
            echo $infcv->userCv($cv);
            echo $inf->ProfilInformations($user);

        }
    }
}

include('Inc/footer.php');


