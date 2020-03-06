<?php
namespace Inc\Repository;
use \PDO;

include('Inc/pdo.php');


class CvRepository
{

    private $table = 'cv';

    public function insertCv($user_id, $category, $study, $experience, $work, $title_formation1, $formation1, $title_formation2, $formation2, $informations, $created_at)
    {

        global $pdo;

        $user_id = $_SESSION['login']['id'];

        $sql = "INSERT INTO $this->table VALUES ('', :user_id, :category, :study, :experience, :work, :title_formation1, :formation1,:title_formation2, :formation2, :informations, created_at) ";

        $query = $pdo->prepare($sql);
        //$query->bindValue(':charcv', $charcv, PDO::PARAM_STR);
        $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $query->bindValue(':category', $category, PDO::PARAM_STR);
        $query->bindValue(':study', $study, PDO::PARAM_STR);
        $query->bindValue(':experience', $experience, PDO::PARAM_STR);
        $query->bindValue(':work', $work, PDO::PARAM_STR);
        $query->bindValue(':title_formation1', $title_formation1, PDO::PARAM_STR);
        $query->bindValue(':formation1', $formation1, PDO::PARAM_STR);
        $query->bindValue(':title_formation2', $title_formation2, PDO::PARAM_STR);
        $query->bindValue(':formation2', $formation2, PDO::PARAM_STR);
        $query->bindValue(':informations', $informations, PDO::PARAM_STR);
        $query->bindValue(':created_at', $created_at, PDO::PARAM_STR);

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