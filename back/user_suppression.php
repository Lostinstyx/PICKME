<?php

require_once  ("../inc/pdo.php");

$id = $_GET['id'];

$sql = "DELETE FROM user WHERE id = :id";
$query = $pdo->prepare($sql);
$query->bindValue(':id',$id, PDO::PARAM_INT);
$query->execute();

header('Location: admin.php');
