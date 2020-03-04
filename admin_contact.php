<?php
session_start();

spl_autoload_register();

use \Inc\Repository\StatusRepository;
use \Inc\Repository\ContactRepository;
use \Inc\Model\ContactModel;
use \Inc\Service\Tools;



$ctc = new ContactRepository();

$contacts = $ctc->getAllContact();

require_once("admin_header.php");?>



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
                        <td><?php echo $contact->getEmail(); ?></td>
                        <td><?php echo $contact->getObject(); ?></td>
                        <td><?php echo $contact->getContent(); ?></td>
                        <td><a class="btn btn-danger" href="contact_suppression.php?id=<?php echo $contact->getId(); ?>">SUPPRESSION</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

    <?php include "admin_footer.php";