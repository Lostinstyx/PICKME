<?php
session_start();

spl_autoload_register();

use Inc\Repository\BackOfficeRepository;

$request = new BackOfficeRepository();

$request->deleteUser('admin.php');
