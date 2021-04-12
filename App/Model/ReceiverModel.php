<?php


namespace App\Model;


class ReceiverModel extends \Core\Model\Model
{
    private $id;
    private $token;
    private $nome;
    private $email;
    private $senha;
    private $cpf;
    private $tel;
    private $estado_civil;
    private $nascimento;
    private $sexo;
    private $comprovante;
//dados aluno
    private $nome_aluno;
    private $cpf_aluno;
    private $matricula;
    private $sexo_aluno;
    private $nascimento_aluno;
    private $etapa_aluno;
    private $escola_id;



    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }
    public function __get($attr)
    {
        return $this->$attr;
    }

//Rotina de Usuario

    public function save_receivers()
    {
        $query  =   'INSERT INTO tb_receivers (nome,email,cpf,tel,estado_civil,nascimento,sexo,comprovante,senha,
                                                nome_aluno,cpf_aluno,matricula,sexo_aluno,nascimento_aluno,etapa_aluno,
                                                escola_id)
         VAlUES (:nome,:email,:cpf,:tel,:estado_civil,STR_TO_DATE(  :nascimento , "%Y-%m-%d"),:sexo,:comprovante,:senha,
                 :nome_aluno,:cpf_aluno,:matricula,:sexo_aluno,STR_TO_DATE(:nascimento_aluno, "%Y-%m-%d"),:etapa_aluno,:escola_id)';
        $stmt   =   $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->__get('nome'));
        $stmt->bindValue(':email', $this->__get('email'));
        $stmt->bindValue(':senha', MD5($this->__get('senha')));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':tel', $this->__get('tel'));
        $stmt->bindValue(':estado_civil', $this->__get('estado_civil'));
        $stmt->bindValue(':nascimento', $this->__get('nascimento'));
        $stmt->bindValue(':sexo', $this->__get('sexo'));
        $stmt->bindValue(':comprovante', $this->__get('comprovante'));
        //dados do aluno
        $stmt->bindValue(':nome_aluno',$this->__get('nome_aluno'));
        $stmt->bindValue(':cpf_aluno',$this->__get('cpf_aluno'));
        $stmt->bindValue(':matricula',$this->__get('matricula'));
        $stmt->bindValue(':sexo_aluno',$this->__get('sexo_aluno'));
        $stmt->bindValue(':nascimento_aluno',$this->__get('nascimento_aluno'));
        $stmt->bindValue(':etapa_aluno',$this->__get('etapa_aluno'));
        $stmt->bindValue(':escola_id',$this->__get('escola_id'));


        try {
            $stmt->execute();
        }catch (\PDOException $e){
            return 301;
        }
    }




    public function Update_user()
    {
        $query  =   "UPDATE tb_users SET   senha = :senha WHERE token = :token";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue('id', $this->__get('id'));
        $stmt->bindValue('senha', $this->__get('senha'));
        $stmt->bindValue(':token',$this->_get('token'));

        $stmt->execute();

    }

    public function delete_user()
    {
        $query = "DELETE FROM tb_users WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
}