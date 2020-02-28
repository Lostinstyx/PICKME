<?php


namespace Inc\Repository;
use \PDO;


include('Inc/pdo.php');


class ResearchCvRepository
{
    private $table = 'cv';

    public function getAllcvs()
    {
        global $pdo;
        $sql = "SELECT * FROM $this->table";
        $query = $pdo->prepare($sql);
        $query->execute();
        $table = $query->fetchAll(\PDO::FETCH_CLASS, '\Inc\Model\CvModel');
        return $table;
    }


    public function getCvByCategorie($category)
    {
        global $pdo;
        //SELECT client FROM achat GROUP BY client
        $sql = "SELECT * FROM $this->table WHERE category = :categorie";
        $query = $pdo->prepare($sql);
        $query->bindValue(':categorie',$category,PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,'\Inc\Model\CvModel');
    }

    public function getCvByNiveau($study)
    {
        global $pdo;
        $sql = "SELECT * FROM $this->table WHERE study = :niveau";
        $query = $pdo->prepare($sql);
        $query->bindValue(':niveau',$study,PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,'\Inc\Model\CvModel');
    }

    public function getCvByExperience($experience)
    {
        global $pdo;

        $sql = "SELECT * FROM $this->table WHERE experience = :experience";
        $query = $pdo->prepare($sql);
        $query->bindValue(':experience',$experience,PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,'\Inc\Model\CvModel');
    }

}