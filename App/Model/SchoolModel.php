<?php


namespace App\Model;


class SchoolModel extends \Core\Model\Model
{
//dados escola
    private $escola;
    private $estado;
    private $municipio;
    private $etapa;
    private $inep;
    private $nome_gestor;
    private $tel_escola;
    private $cargo;
    private $email_escola;
    private  $cpf;

    public function __set($attr, $value){
        return $this->$attr = $value;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }

    public function save_scool()
    {
        $query =    'INSERT INTO tb_schools 
    (escola,estado,municipio,etapa,inep,nome_gestor,cpf,tel_escola,cargo,matricula,email_escola) VALUES 
    (:escola,:estado,:municipio,:etapa,:inep,:nome_gestor,:cpf,:tel_escola,:cargo,:matricula,:email_escola)';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':escola',$this->__get('escola'));
        $stmt->bindValue(':estado', $this->__get('estado'));
        $stmt->bindValue(':municipio', $this->__get('municipio'));
        $stmt->bindValue(':etapa', $this->__get('etapa'));
        $stmt->bindValue(':inep', $this->__get('inep'));
        $stmt->bindValue(':nome_gestor', $this->__get('nome_gestor'));
        $stmt->bindValue(':cpf', $this->__get('cpf'));
        $stmt->bindValue(':tel_escola', $this->__get('tel_escola'));
        $stmt->bindValue(':cargo', $this->__get('cargo'));
        $stmt->bindValue(':matricula', $this->__get('matricula'));
        $stmt->bindValue('email_escola', $this->__get('email_escola'));
    }

    public function select_school()
    {
        $query = 'SELECT * FROM tb_schools';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}