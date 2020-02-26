<?php
namespace Inc\Repository;
use \PDO;

include ('Inc/function/functions.php');
include('Inc/pdo.php');

class ArticleRepository
{
  private $table = 'users';

  public function getAllArticles()
  {
    global $pdo;
    $sql = "SELECT * FROM $this->table";
    $query = $pdo->prepare($sql);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_CLASS,'\Inc\Model\ArticleModel');
  }

  public function getOneArticleById($id)
  {
    global $pdo;
    $sql = "SELECT * FROM $this->table WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
    return $query->fetchObject('\Inc\Model\ArticleModel');
  }

  public function insertUser($name, $surname, $mail, $password, $role = 1)
  {

      global $pdo;

      $token = generateRandomString(255);

      $hashPassword = password_hash($password, PASSWORD_BCRYPT);



    $sql = "INSERT INTO $this->table VALUES (NULL, :name, :surname, :mail, :password, :token, :role,NOW(), NULL)";

    $query = $pdo->prepare($sql);

    $query->bindValue(':name',$name,PDO::PARAM_STR);
    $query->bindValue(':surname',$surname,PDO::PARAM_STR);
    $query->bindValue(':mail',$mail,PDO::PARAM_STR);
    $query->bindValue(':password',$hashPassword,PDO::PARAM_STR);
    $query->bindValue(':token',$token,PDO::PARAM_STR);
    $query->bindValue(':role',$role,PDO::PARAM_INT);

    $query->execute();

    return $pdo->lastInsertId();
  }

    public function insertRecruter($title,$content)
    {
        global $pdo;
        $sql = "INSERT INTO $this->table VALUES (NULL, :name,:surname, :mail, :password, :token, :role,NOW(),)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':title',$title,PDO::PARAM_STR);
        $query->bindValue(':content',$content,PDO::PARAM_STR);
        $query->execute();
        return $pdo->lastInsertId();
    }
}
