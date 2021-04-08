<?php


namespace App\Model;


use Core\Model\Model;
use MongoDB\Driver\Query;

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
        $query = "SELECT id,email,senha, nome from tb_responsaveis WHERE email = :email AND senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email',$this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->execute();
        $user = $stmt->fetch(\PDO::FETCH_ASSOC);


        if($user['id'] != '' && $user['email'] != ''){
            $this->__set('email',$user['email']);
            $this->__set('id',$user['id']);
            $this->__set('nome',$user['nome']);

        }
        return $this;

    }

    public function save()
    {
        $query = "INSERT INTO tb_users (nome,email,senha) VALUES (:nome,:email, :senha)";

        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome',$this->__get('nome'));
        $stmt->bindValue(':email',$this->__get('email'));
        $stmt->bindValue(':senha', $this->__get('senha'));
        $stmt->execute();

    }

    public function token()
    {
        $query = " UPDATE adriano.tb_users SET token = :token WHERE email = :email";
        $stmt  = $this->db->prepare($query);
        $stmt->bindValue('token',$this->__get('token'));
        $stmt->bindValue('email',$this->__get('email'));
        $stmt->execute();
    }
}