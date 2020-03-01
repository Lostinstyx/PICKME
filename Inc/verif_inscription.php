<?php
//spl_autoload_register();
//
//use \Inc\Service\Form;
//use \Inc\Service\Validation;
//use \Inc\Repository\ArticleRepository;
//use \Inc\Service\Tools;
//
//$tool = new Tools();
//
//$request = new ArticleRepository();
//$verif = new Validation();
//
//$errors = array();
//
//if (!empty($_POST['submitted'])) {
//
//    $name       = trim(strip_tags($_POST['nom']));
//    $surname    = trim(strip_tags($_POST['prenom']));
//    $mail       = trim(strip_tags($_POST['emailI']));
//    $password   = trim(strip_tags($_POST['mdpI']));
//
//    $verif->validChamp($errors,$name,'nom',1,50);
//    $verif->validChamp($errors,$surname,'prenom',1,50);
//
//    if ($errors == 0) {
//
//    $request->insertUser($name,$surname,$mail,$password);
//
//    }
//}
