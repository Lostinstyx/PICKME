<?php
namespace Inc\Repository;
use \PDO;
include('Inc/pdo.php');

class ProfilRepository
{
    private $table = 'user';

    public function getAllUser()
    {
        global $pdo;
        $sql = "SELECT * FROM user";
        $query = $pdo->prepare($sql);
        $query->execute();
        $users = $query->fetchAll();
        return $users;
    }
}
