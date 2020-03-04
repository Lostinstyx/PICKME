<?php
session_start();
require("../inc/pdo.php");
require ("../function/functions.php");

$errors = array();
$success = false;

if (!empty($_POST['submitted'])) {

    $name = clean($_POST['name']);
    $surname = clean($_POST['surname']);
    $mail = clean($_POST['mail']);
    $pwd = clean($_POST['password']);
    $cfrm = clean($_POST['cfrmPassword']);

    //validation
    $errors = textValid($errors, $name, 2, 50, 'name');
    $errors = textValid($errors, $surname, 2, 50, 'surname');
    $errors = cleanMail($errors, $mail, 'mail');

    if (!empty($mail)) {
        $sql = "SELECT id FROM user WHERE mail = :mail LIMIT 1";
        $query = $pdo->prepare($sql);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        $check = $query->fetch();

        if (!empty($check)) {
            $errors['mail'] = 'Cette adresse existe déjà';
        }
    }

    $errors = passwordValid($pwd, $errors, 6, 'password');

    if (!empty($pwd)) {
        if ($pwd !== $cfrm) {
            $errors['cfrmPassword'] = 'Les deux mots de passe ne correspondent pas';
        }
    }

    if (count($errors) === 0) {
        $hash = password_hash($pwd, PASSWORD_BCRYPT);
        $token = generateRandomString(255);

        $sql = "INSERT INTO user VALUES (NULL, :name, :surname, :mail, :pwd, :token, 'user' , NOW(), NULL)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':surname', $surname, PDO::PARAM_STR);
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);
        $query->bindValue(':pwd', $hash, PDO::PARAM_STR);
        $query->bindValue(':token', $token, PDO::PARAM_STR);
        $query->execute();

        $success = true;

        //redirection
        header('Location: admin.php');
    }

}

include "admin_header.php";
if (is_admin()) { ?>

<div id="form-inscription" class="form">
    <form action="#" class="signup" method="post">
        <div class="surname">
            <label for="surname"></label>
            <input type="text" name="surname" id="surname" placeholder="Votre nom*" value="<?php if (!empty
            ($_POST['surname'])) {
                echo $_POST['surname'];
            } ?>">
            <?php spanErr($errors, 'surname'); ?>
        </div>
        <div class="name">
            <label for="name"></label>
            <input type="text" name="name" id="name" placeholder="Votre prenom*" value="<?php if (!empty
            ($_POST['name'])) {
                echo $_POST['name'];
            } ?>">
            <?php spanErr($errors, 'name'); ?>
        </div>
        <div class="mail">
            <label for="mail"></label>
            <input type="email" name="mail" id="mail" placeholder="Votre mail*" <?php if (!empty
            ($_POST['mail'])) {
                echo $_POST['mail'];
            } ?>>
            <?php spanErr($errors, 'mail'); ?>
        </div>
        <div class="password">
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Votre password*">
            <?php spanErr($errors, 'password'); ?>
        </div>
        <div class="cfrmPassword">
            <label for="cfrmPassword"></label>
            <input type="password" name="cfrmPassword" id="cfrmPassword" placeholder="Confirmez votre mdp*">
            <?php spanErr($errors, 'cfrmPassword'); ?>
        </div>
        <p class="need">* Champs obligatoires</p>
        <input id="submit_signup" type="submit" name="submitted" value="Envoyer">
    </form>

    <?php include "admin_footer.php";
    } else {
    header('Location: ../403.php');
    }
