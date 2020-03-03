<?php
session_start();

spl_autoload_register();

use Inc\Repository\BackOfficeRepository;
use Inc\Model\BackOfficeModel;
use Inc\Repository\LoggedRepository;

$logged = new LoggedRepository();
if ($logged::is_admin()) {
?>



                    <i class="fas fa-table"></i> Liste des utilisateurs <a href="user_creation.php">Créer un nouvelle utilisateur</a></div>
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
                                  <td><?php echo $user['surname']; ?></td>
                                  <td><?php echo $user['name']; ?></td>
                                  <td><?php echo $user['mail']; ?></td>
                                  <td><?php echo $user['role'] ?></td>
                                  <td><a class="btn btn-success"href="user_edition.php?id=<?php echo $user['id'] ?>">EDITION</a></td>
                                  <td><a class="btn btn-danger" href="user_suppression.php?id=<?php echo $user['id'] ?>">SUPPRESSION</a></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                        </table>

                      </div>
                    </div>

<?php include "admin_footer.php";
} else {
    header('Location:../403.php');
}?>
