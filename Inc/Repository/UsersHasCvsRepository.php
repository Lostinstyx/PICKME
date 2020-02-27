<?php

namespace Inc\Repository;
use \PDO;

include ('Inc/function/functions.php');
include('Inc/pdo.php');

class UsersHasCvsRepository
{
   private $table = 'cv';
   private $table1 = 'user';

    public function selectUserHasCv()
    {
        $sql = "SELECT $this->table.cv_user,$this->table1.id FROM $this->table LEFT JOIN $this->table1 ON $this->table.cv_user = $this->table1.id";
    }

}