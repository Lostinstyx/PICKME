<?php
session_start();
require ("../inc/pdo.php");
require ('../function/functions.php');

$sql = "SELECT * from contact WHERE 1";
$query = $pdo->prepare($sql);
$query->execute();
$contacts = $query->fetchALL();

require_once ("admin_header.php");
if (is_admin()) {
    ?>



    <i class="fas fa-table"></i> Liste des messages</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Email</th>
                    <th>Objet</th>
                    <th>Message</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($contacts as $key => $contact): ?>
                    <tr>
                        <td><?php echo $contact['contactMail']; ?></td>
                        <td><?php echo $contact['contactObjet']; ?></td>
                        <td><?php echo $contact['contactMessage']; ?></td>
                        <td><a class="btn btn-danger" href="contact_suppression.php?id=<?php echo $contact['contactId'] ?>">SUPPRESSION</a></td>
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
