<?php
session_start();

spl_autoload_register();


use \Inc\Repository\StatusRepository;
use \Inc\Repository\BackOfficeRepository;
use \Inc\Service\Tools;

$logged = new StatusRepository();
$request = new BackOfficeRepository();
$tool = new Tools();


$users = $request->getUser();


require_once("admin_header.php");

?>


<i class="fas fa-table"></i> Liste des utilisateurs <a style="color: black; margin-left: 5%;" href="user_creation.php">Créer un compte utilisateur</a>
<a style="color: blue; margin-left: 5%;" href="recruter_creation.php">Créer un compte recruteur</a> <a style="color: red; margin-left: 5%;" href="admin_creation.php">Créer un compte administrateur</a></div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Edition</th>
                <th>Supression</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $key => $user): ?>
                <tr>
                    <td><?php echo $user->getSurname(); ?></td>
                    <td><?php echo $user->getName(); ?></td>
                    <td><?php echo $user->getEmail(); ?></td>
                    <td><?php echo $user->getRole(); ?></td>
                    <td><a class="btn btn-success"href="user_edition.php?id=<?php echo $user->getId(); ?>">EDITION</a></td>
                    <td><a class="btn btn-danger" href="user_suppression.php?id=<?php echo $user->getId(); ?>">SUPPRESSION</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>

    <?php include "admin_footer.php";?>

