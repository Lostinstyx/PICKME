<?php
namespace Inc\Repository;
use \PDO;

include('Inc/pdo.php');


class CvRepository
{

    private $table = 'cv';

    public function insertCv($charcv)
    {

        global $pdo;

        $cv_user = $_SESSION['login']['id'];

        $sql = "INSERT INTO testcv VALUES ('', :charcv, :user_id)";

        $query = $pdo->prepare($sql);
        $query->bindValue(':charcv', $charcv, PDO::PARAM_STR);
        $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);

        $query->execute();



        return $pdo->lastInsertId();
    }


    public function getUserCv()
    {
        global $pdo;

        $id = $_SESSION['login']['id'];

        $sql = "SELECT * FROM $this->table WHERE cv_user = :id";

        $query = $pdo->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchALL(PDO::FETCH_CLASS, '\Inc\Model\CvModel');

    }

}