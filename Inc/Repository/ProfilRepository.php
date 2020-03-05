<?php
namespace Inc\Repository;
use \PDO;
include('Inc/pdo.php');

class ProfilRepository
{
    private $table = 'user';

    public function getUser()
    {

        global $pdo;

        $id = $_SESSION['login']['id'];

        $sql = "SELECT * FROM $this->table WHERE id = :id";

        $query = $pdo->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchALL(PDO::FETCH_CLASS, '\Inc\Model\ProfilModel');

    }


}
