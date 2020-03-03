<?php


namespace Inc\Repository;

use Inc\Service\Tools;
use \PDO;
use DateTime;

class BackOfficeRepository
{

    private $table = 'user';

    public function getUser() {

    global $pdo;
    $sql = "SELECT * from $this->table";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchALL(PDO::FETCH_CLASS, '\Inc\Model\BackOfficeModel');

    }

}