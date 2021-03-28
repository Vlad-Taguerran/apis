<?php


namespace App\Model;


class Admin extends \Core\Model\Model
{
private $id;
private $nome;
private $sobrenome;
private $horario;
private $data;
private $atendimento;


    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }
    public function __get($attr)
    {
       return $this->$attr;
    }
//Rotina de Horarios
    public function save_horario()
    {
        $query = "INSERT INTO tb_horarios VALUES (:nome,:sobrenome,:horario,:data,:atendimento)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome',$this->__get('nome'));
        $stmt->bindValue(':sobrenome',$this->__get(':sobrenome'));
        $stmt->bindValue(':horario', $this->__get('data'));
        $stmt->bindValue(':atendimento', $this->__get('atendimento'));
        $stmt->execute();

    }

    public function update_horario()
    {
        $query  =   "UPDATE tb_horarios SET horario = :horario, data = :data";
        $stmt   =   $this->db->prepare($query);
        $stmt->bindValue('horario',$this->__get('horario'));
        $stmt->bindValue('data', $this->__get('data'));
        $stmt->execute();
    }

    public function delete_horario()
    {
        $query  =   "DELETE FROM tb_horarios WHERE id = :id";
        $stmt   =   $this->db->prepare($query);
        $stmt->bindValue('id', $this->__get('id') );
        $stmt->execute();
    }
//Rotina de Usuario

    public function save_user()
    {
        $query  =   "INSET INTO tb_users VAlUES (:nome,:sobrenome,:email,:senha,:tell,:ficha,:nivel";
        $stmt   =   $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':sobrenome', $this->__get('sobrenome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', MD5($this->__get('senha')));
        $stmt->bindValue(':tell', 'tell');
        $stmt->bindValue(':ficha',$this->__get('doc'));
        $stmt->bindValue('nivel', $this->__get('nivel'));
        $stmt->execute();
    }

    public function Update_user()
    {
        $query  =   "UPDATE tb_users SET nome = :nome, sobrenome = :sobrenome, email = :email
                    , senha = :senha, tell = :tell, ficha = :ficha WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue('id', $this->__get('id'));
        $stmt->bindValue('nome',$this->__get('nome'));
        $stmt->bindValue('sobrenome', $this->__get('sobrenome'));
        $stmt->bindValue('email', $this->__get('email'));
        $stmt->bindValue('senha', $this->__get('senha'));
        $stmt->bindValue('tell',$this->__get('tell'));
        $stmt->bindValue('ficha',$this->__get('ficha'));
        $stmt->execute();

    }

    public function delete_user()
    {
        $query = "DELETE FROM tb_users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

}