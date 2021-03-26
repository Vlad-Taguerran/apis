<?php


namespace App\Model;


use Core\Model\Model;

class Users extends Model
{
    private $id;
    private $nome;
    private $sobrenome;
    Private $email;
    private $senha;
    private $doc;

    public function __get($attr)
    {
        return $this->$attr;
    }
    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }

    public function auth()
    {
        $query = "SELECT id,email,senha from tb_users WHERE email = :email AND senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email',$this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->execute();
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $user;


    }
}