<?php
require("Inc/pdo.php");

spl_autoload_register();

use \Inc\Repository\ContactRepository;

$contact = new ContactRepository();

$contact->deleteContact('admin_contact.php');
