<?php
namespace Inc\Repository;
use \PDO;
include('Inc/pdo.php');

class ContactRepository
{
    private $tab= 'contact';

    public function getAllContact()
    {
        global $pdo;
        $sql = "SELECT * FROM $this->tab";
        $query = $pdo->prepare($sql);
        $query->execute();
        $table = $query->fetchAll(\PDO::FETCH_CLASS, '\Inc\Models\ContactModels');
        return $table;
    }

    public function getFullContact($id)
    {
        global $pdo;
        $sql = "SELECT * FROM $this->tab WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $table = $query->fetchAll(\PDO::FETCH_CLASS, '\Inc\Models\ContactModels');
        return $table;
    }



}