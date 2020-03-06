<?php
session_start();

require("Inc/pdo.php");

spl_autoload_register();

use \Inc\Repository\ContactRepository;
use Inc\Repository\StatusRepository;

$logged = new StatusRepository();

$contact = new ContactRepository();


if ($logged::is_admin()) {
$contact->deleteContact('admin_contact.php');
} else {
    header('Location: 403.php');
}
