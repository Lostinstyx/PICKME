<?php

namespace Inc\Repository;
use \PDO;

include('Inc/pdo.php');

class BackOfficeRepository
{

    private $table = 'user';

    public function getUser() {

    global $pdo;

    $sql = "SELECT * from $this->table";
    $query = $pdo->prepare($sql);
    $query->execute();
    $table = $query->fetchALL(PDO::FETCH_CLASS, '\Inc\Model\BackOfficeModel');
    return $table;

    }

    public function deleteUser($header) {
        global $pdo;

        $id = $_GET['id'];

        $sql = "DELETE FROM user WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id',$id, PDO::PARAM_INT);
        $query->execute();

        header('Location: '.$header);
    }

}

