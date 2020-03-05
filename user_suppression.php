<?php
session_start();

spl_autoload_register();

use Inc\Repository\BackOfficeRepository;
use Inc\Repository\StatusRepository;

$request = new BackOfficeRepository();
$logged = new StatusRepository();

if ($logged::is_admin()) {
$request->deleteUser('admin.php');
} else {
    header('Location: 403.php');
}
