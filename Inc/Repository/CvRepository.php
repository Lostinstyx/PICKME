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


        $sql = "INSERT INTO $this->table VALUES (NULL, :category, :study, :experience, :work, :title_formation1,
 :formation1, :title_formation2, :formation2, :title_experience1, :experience1, :title_experience2, :experience2, :informations,NOW(), NULL)";

        $query = $pdo->prepare($sql);

        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':surname', $surname, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':telephone', $telephone, PDO::PARAM_STR);
        $query->bindValue(':street', $street, PDO::PARAM_STR);
        $query->bindValue(':postalcode', $postalcode, PDO::PARAM_STR);
        $query->bindValue(':city', $city, PDO::PARAM_STR);
        $query->bindValue(':password', $hashPassword, PDO::PARAM_STR);
        $query->bindValue(':token', $token, PDO::PARAM_STR);
        $query->bindValue(':role', $role, PDO::PARAM_INT);

        $query->execute();

        return $pdo->lastInsertId();
    }
}