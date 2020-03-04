<?php
require("Inc/pdo.php");

spl_autoload_register();

use \Inc\Repository\BackOfficeRepository;

$user = new BackOfficeRepository();

$user->deleteUser('admin.php');
