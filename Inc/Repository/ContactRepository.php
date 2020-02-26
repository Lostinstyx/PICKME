<?php
namespace Inc\Repository;
use \PDO;
include('Inc/pdo.php');

class ContactRepository
{
    private $table= 'contact';

    public function getAllContact()
    {
        global $pdo;
        $sql = "SELECT * FROM $this->table";
        $query = $pdo->prepare($sql);
        $query->execute();
        $table = $query->fetchAll(\PDO::FETCH_CLASS, '\Inc\Models\ContactModels');
        return $table;
    }

    public function getFullContact($id)
    {
        global $pdo;
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id',$id,PDO::PARAM_INT);
        $query->execute();
        $table = $query->fetchAll(\PDO::FETCH_CLASS, '\Inc\Models\ContactModels');
        return $table;
    }

    public function insertContact($email, $object, $content)
    {
        global $pdo;

        $sql = "INSERT INTO $this->table VALUES (NULL, :email, :object, :content,NOW())";

        $query = $pdo->prepare($sql);

        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':object', $object, PDO::PARAM_STR);
        $query->bindValue(':content', $content, PDO::PARAM_STR);

        $query->execute();

        return $pdo->lastInsertId();
    }
}