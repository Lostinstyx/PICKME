<?php

session_start();
require('inc/pdo.php');
require('inc/function.php');
$title = 'inscription';
$errors = array();
$success = false;


if (!empty($_POST['submitted'])) {

    $pseudo = trim(strip_tags($_POST['pseudo']));
    $email = trim(strip_tags($_POST['email']));
    $password = trim(strip_tags($_POST['password']));
    $cgu = trim(strip_tags($_POST['cgu']));

    if (!empty($password)){
        $errors['pseudo'] = 'Veuillez renseigner un pseudo';
    } else {

        $sql = "SELECT id FROM users WHERE pseudo = :pseudo";
        $query = $pdo->prepare($sql);
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->execute();
        $verifpseudo = $query->fetch();
        if (!empty($verifpseudo)) {
            $errors['pseudo'] = 'Ce pseudo existe déjà';
        }
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = 'Veuillez renseigner un email valide';
    } else {

        $sql = "SELECT id FROM users WHERE email = :mail LIMIT 1";
        $query = $pdo->prepare($sql);
        $query->bindValue(':mail', $email, PDO::PARAM_STR);
        $query->execute();
        $verifemail = $query->fetch();
        if (!empty($verifemail)) {
            $errors['mail'] = 'Cet email existe déjà';
        }
    }

    if (!empty($password)) {
        if (mb_strlen($password) <= 5) {
            $errors['password'] = 'Min 6 caractères';
        }
    } else {
        $errors['password'] = 'Veuillez renseigner un mot de passe';
    }

    if (!empty($_POST['cgu']) && $_POST['cgu']) {

    } else {
        $errors['cgu'] = 'Veuillez accepter les conditions générales d’utilisation';
    }


    if (count($errors) == 0) {

        $hashpassword = password_hash($password, PASSWORD_BCRYPT);
        $token = generateRandomString(255);

        $sql = "INSERT INTO users VALUES (null,:pseudo,:email,:password,:token,'user',NOW(),null)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $hashpassword, PDO::PARAM_STR);
        $query->bindValue(':token', $token, PDO::PARAM_STR);
        $query->execute();
        $success = true;

        header();
    }
}

include('inc/header.php');

