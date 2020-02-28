<?php


spl_autoload_register();

use \Inc\Service\Form;
use \Inc\Service\Validation;
use \Inc\Repository\ArticleRepository;
use \Inc\Service\Tools;

$tool = new Tools();

$request = new ArticleRepository();
$verif = new Validation();

$errors = array();

 if(!empty($_POST['submitted'])) {

    $login = trim(strip_tags($_POST['login']));
    $password = trim(strip_tags($_POST['password']));

    $verif->VerifMail($errors, $login, 'login');
    $verif->validChamp($errors, $password, 'password', 1, 50);

    if ($errors == 0) {

        $sql = "SELECT * FROM user WHERE email = :login";
        $query = $pdo->prepare($sql);
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();

        print_r($user);

        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['login'] = array(
                    'id' => $user['id'],
                    'nom' => $user['surname'],
                    'prenom' => $user['name'],
                    'role' => $user['role'],
                    'ip' => $_SERVER['REMOTE_ADDR'],
                );

                header('Location: index.php');

            }
        }
    }
}