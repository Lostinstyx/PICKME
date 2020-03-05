<?php
session_start();

spl_autoload_register();

use Inc\Repository\BackOfficeRepository;
use Inc\Repository\LoggedRepository;

$request = new BackOfficeRepository();
$logged = new LoggedRepository();

if ($logged::is_admin()) {
$request->deleteUser('admin.php');
} else {
    header('Location: 403.php');
}
