<?php
require ("../inc/pdo.php");

$id = $_GET['id'];

$sql = "DELETE FROM contact WHERE contactId = :id";
$query = $pdo->prepare($sql);
$query->bindValue(':id',$id, PDO::PARAM_INT);
$query->execute();

header('Location: admin_contact.php');
