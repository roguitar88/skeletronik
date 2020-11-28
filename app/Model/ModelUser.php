<?php
namespace App\Model;

use App\Model\ModelConnection;

class ModelUser extends ModelConnection
{    

    /* 
    //Example
    public function checkEmail($email)
    {
        $select = $this->pdo()->prepare("SELECT * FROM users WHERE email = ?");
        $select->bindParam(1, $email, \PDO::PARAM_STR);
        $select->execute();
        return $select;
    }
    */

}
