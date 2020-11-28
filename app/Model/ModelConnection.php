<?php
namespace App\Model;

abstract class ModelConnection
{
    protected function pdo()
    {
        try {
            //Localhost
            $pdo = new \PDO("mysql:host=".LH_HOST.";dbname=".LH_DB."", LH_USER, LH_PASS, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8, NAMES utf8"));
            return $pdo;
        } catch (\Exception $e) {
            try {
                //Remote Host
                $pdo = new \PDO("mysql:host=".HOST.";dbname=".DB."", USER, PASS, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8, NAMES utf8"));
                return $pdo;
            } catch (\Exception $e) {
                echo ("Erro: {$e->getMessage()}");
            }
        }
    }

}