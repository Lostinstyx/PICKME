<?php
namespace Inc\Repository;
use \PDO;

include ('Inc/function/functions.php');
include('Inc/pdo.php');


class CvRepository
{

    private $table = 'cv';


    public function insertCv($category, $study, $experience, $work, $title_formation1, $formation1,
                             $title_formation2, $formation2, $title_experience1, $experience1, $title_experience2,
                             $experience2,$informations)
    {

        global $pdo;

        $cv_user = $_SESSION['login']['id'];

        $sql = "INSERT INTO $this->table VALUES (NULL, :cv_user, :category, :study, :experience, :work, :title_formation1,
        :formation1, :title_formation2, :formation2, :title_experience1, :experience1, :title_experience2, :experience2, :informations,NOW(), NULL)";

        $query = $pdo->prepare($sql);
        $query->bindValue(':cv_user', $cv_user, PDO::PARAM_STR);
        $query->bindValue(':category', $category, PDO::PARAM_STR);
        $query->bindValue(':study', $study, PDO::PARAM_STR);
        $query->bindValue(':experience', $experience, PDO::PARAM_STR);
        $query->bindValue(':work', $work, PDO::PARAM_STR);
        $query->bindValue(':title_formation1', $title_formation1, PDO::PARAM_STR);
        $query->bindValue(':formation1', $formation1, PDO::PARAM_STR);
        $query->bindValue(':title_formation2', $title_formation2, PDO::PARAM_STR);
        $query->bindValue(':formation2', $formation2, PDO::PARAM_STR);
        $query->bindValue(':title_experience1', $title_experience1, PDO::PARAM_STR);
        $query->bindValue(':experience1', $experience1, PDO::PARAM_STR);
        $query->bindValue(':title_experience2', $title_experience2, PDO::PARAM_STR);
        $query->bindValue(':experience2', $experience2, PDO::PARAM_STR);
        $query->bindValue(':informations', $informations, PDO::PARAM_STR);

        $query->execute();

        return $pdo->lastInsertId();
    }
}