<?php
namespace Inc\Repository;
use Inc\Service\Tool;
use \PDO;

include('Inc/pdo.php');

class ArticleRepository
{
    private $table = 'user';

    public function getAllArticles()
    {
        global $pdo;
        $sql = "SELECT * FROM $this->table";
        $query = $pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, '\Inc\Model\ArticleModel');
    }

    public function getUserConnexion($login)
    {
        global $pdo;
        $sql = "SELECT * FROM $this->table WHERE email = :login";
        $query = $pdo->prepare($sql);
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }

    public function InitializeSession($user,$header)
    {
        $_SESSION['login'] = array(
            'id' => $user['id'],
            'nom' => $user['surname'],
            'prenom' => $user['name'],
            'role' => $user['role'],
            'ip' => $_SERVER['REMOTE_ADDR'],
        );

        header('Location: '.$header);
    }

    public function getOneArticleById($id)
    {
        global $pdo;
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchObject('\Inc\Model\ArticleModel');
    }


    public function insertUser($name, $surname, $email, $telephone, $street, $postalcode, $city, $password, $role = 'user')
    {

        global $pdo;

        $token = generateRandomString(255);

        $hashPassword = password_hash($password, PASSWORD_BCRYPT);


        $sql = "INSERT INTO $this->table VALUES (NULL, :name, :surname, :email, :telephone, :street, :postalcode, :city, NULL, :password, :token, :role, NOW(), NULL)";

        $query = $pdo->prepare($sql);

        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':surname', $surname, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':telephone', $telephone, PDO::PARAM_STR);
        $query->bindValue(':street', $street, PDO::PARAM_STR);
        $query->bindValue(':postalcode', $postalcode, PDO::PARAM_STR);
        $query->bindValue(':city', $city, PDO::PARAM_STR);
        //$query->bindValue(':siret', $siret, PDO::PARAM_STR);
        $query->bindValue(':password', $hashPassword, PDO::PARAM_STR);
        $query->bindValue(':token', $token, PDO::PARAM_STR);
        $query->bindValue(':role', $role, PDO::PARAM_STR);

        $query->execute();

        return $pdo->lastInsertId();
    }


    public function insertRecruter($nom, $prenom, $email, $telephone, $street, $postalcode, $city, $siret, $password, $role = 'recruter')
    {
        global $pdo;

        $token = generateRandomString(255);

        $hashPassword = password_hash($password, PASSWORD_BCRYPT);


        $sql = "INSERT INTO $this->table VALUES (NULL, :name, :surname, :email, :telephone, :street, :postalcode, :city, :siret, :password, :token, :role, NOW(), NULL)";

        $query = $pdo->prepare($sql);

        $query->bindValue(':name', $nom, PDO::PARAM_STR);
        $query->bindValue(':surname', $prenom, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':telephone', $telephone, PDO::PARAM_STR);
        $query->bindValue(':street', $street, PDO::PARAM_STR);
        $query->bindValue(':postalcode', $postalcode, PDO::PARAM_STR);
        $query->bindValue(':city', $city, PDO::PARAM_STR);
        $query->bindValue(':siret', $siret, PDO::PARAM_STR);
        $query->bindValue(':password', $hashPassword, PDO::PARAM_STR);
        $query->bindValue(':token', $token, PDO::PARAM_STR);
        $query->bindValue(':role', $role, PDO::PARAM_STR);

        $query->execute();

        return $pdo->lastInsertId();
    }

    public function insertAdmin($nom, $prenom, $email, $telephone, $street, $postalcode, $city, $password, $role = 'admin')
    {
        global $pdo;

        $token = generateRandomString(255);

        $hashPassword = password_hash($password, PASSWORD_BCRYPT);


        $sql = "INSERT INTO $this->table VALUES (NULL, :name, :surname, :email, :telephone, :street, :postalcode, :city, NULL, :password, :token, :role, NOW(), NULL)";

        $query = $pdo->prepare($sql);

        $query->bindValue(':name', $nom, PDO::PARAM_STR);
        $query->bindValue(':surname', $prenom, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':telephone', $telephone, PDO::PARAM_STR);
        $query->bindValue(':street', $street, PDO::PARAM_STR);
        $query->bindValue(':postalcode', $postalcode, PDO::PARAM_STR);
        $query->bindValue(':city', $city, PDO::PARAM_STR);
        $query->bindValue(':password', $hashPassword, PDO::PARAM_STR);
        $query->bindValue(':token', $token, PDO::PARAM_STR);
        $query->bindValue(':role', $role, PDO::PARAM_STR);

        $query->execute();

        return $pdo->lastInsertId();
    }

}
