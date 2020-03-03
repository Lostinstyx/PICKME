<?php
session_start();
require ("../inc/pdo.php");
require ("../function/functions.php");

$id = $_GET['id'];

$sql = "SELECT * FROM `user` WHERE id = :id";
$query = $pdo->prepare($sql);
$query->bindValue(':id', $id, PDO::PARAM_INT);
$query->execute();
$user = $query->fetch();

$errors = array();

if (!empty($_POST['submitted'])) {

    $name = clean($_POST['name']);
    $surname = clean($_POST['surname']);
    $mail = clean($_POST['mail']);
    $pwd = clean($_POST['password']);
    $cfrm = clean($_POST['cfrmPassword']);
    $role = $_POST['role'];


    $errors = textValid($errors, $name, 2, 50, 'name');
    $errors = textValid($errors, $surname, 2, 50, 'surname');
    $errors = cleanMail($errors, $mail, 'mail');

  if (empty($errors)) {

  $password = password_hash($pwd, PASSWORD_BCRYPT);

  $sql =" UPDATE user SET name = :name, surname = :surname, mail = :mail, password = :password, role = :role, modifiedAt = NOW() WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':name',$name, PDO::PARAM_STR);
    $query->bindValue(':surname',$surname, PDO::PARAM_STR);
    $query->bindValue(':mail',$mail, PDO::PARAM_STR);
    $query->bindValue(':password',$password, PDO::PARAM_STR);
    $query->bindValue(':role',$role, PDO::PARAM_STR);
    $query->bindValue(':id',$id, PDO::PARAM_INT);
    $query->execute();

    header("Location: admin.php");
  }
}

require_once ("admin_header.php");
if (is_admin()) { ?>

    <form action="#" class="usermodified" method="post">
        <div class="surname">
            <label for="surname"></label>
            <input type="text" name="surname" id="surname" value="<?php echo $user['name'];
            if (!empty
            ($_POST['surname'])) {
                echo $_POST['surname'];
            } ?>">
            <?php spanErr($errors, 'surname'); ?>
        </div>
        <div class="name">
            <label for="name"></label>
            <input type="text" name="name" id="name" value="<?php echo $user['surname'];
            if (!empty
            ($_POST['name'])) {
                echo $_POST['name'];
            } ?>">
            <?php spanErr($errors, 'name'); ?>
        </div>
        <div class="mail">
            <label for="mail"></label>
            <input type="text" name="mail" id="mail" value="<?php echo $user['mail'];
            if (!empty
            ($_POST['mail'])) {
                echo $_POST['mail'];
            } ?>">
            <?php spanErr($errors, 'mail'); ?>
        </div>
        <div class="password">
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Mot de passe*">
            <?php spanErr($errors, 'password'); ?>
        </div>
        <div class="cfrmPassword">
            <label for="cfrmPassword"></label>
            <input type="password" name="cfrmPassword" id="cfrmPassword" placeholder="Confirmez mot de passe*">
            <?php spanErr($errors, 'cfrmPassword'); ?>
        </div>
        <div class="selectVerif">
            <label for="role">Role*</label>
            <select name="role" id="role">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
        </div>

        <input id="submit_edition" type="submit" name="submitted" value="Envoyer">
    </form>

    <?php require_once("admin_footer.php");
} else {
    header('Location: ../403.php');
}

