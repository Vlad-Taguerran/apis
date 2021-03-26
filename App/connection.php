<?php
namespace App;

class Connection {
    public static function getDb()
    {
        try {
            $conn = new \PDO(
                "mysql:host=localhost;dbname=clinica-fisiolate;charset=utf8","root","");
            $conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch( \PDOException $e){
            echo $e->getMessage();
        }
    }
}