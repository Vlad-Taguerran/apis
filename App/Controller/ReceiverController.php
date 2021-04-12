<?php


namespace App\Controller;


use Core\Model\Container;

class ReceiverController extends \Core\Controller\Controller
{
    public function save_receiver()
    {
        header('Access-Control-Allow-Origin: *');

        header('Access-Control-Allow-Methods: GET, POST');

        header("Access-Control-Allow-Headers: X-Requested-With");
        ///DADOS RESPONSAVEIS//
        $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $cpf   = filter_var($_POST['cpf'], FILTER_SANITIZE_STRING);
        $tel   = filter_var($_POST['tel'], FILTER_SANITIZE_STRING);
        $estado_civil = filter_var($_POST['estado_civil']. FILTER_SANITIZE_STRING);
        $nascimento = filter_var($_POST['nascimento'], FILTER_SANITIZE_STRING);
        $sexo = filter_var($_POST['sexo'], FILTER_SANITIZE_STRING);
        $file = $_FILES['comprovante'];
        $senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);
        ///DADOS ALUNOS///
        $nome_aluno = filter_var($_POST['nome_aluno'], FILTER_SANITIZE_STRING);
        $cpf_aluno  = filter_var($_POST['cpf_aluno'], FILTER_SANITIZE_STRING);
        $matricula  = filter_var($_POST['matricula'], FILTER_SANITIZE_STRING);
        $sexo_aluno = filter_var($_POST['sexo_aluno'], FILTER_SANITIZE_STRING);
        $etapa      = filter_var($_POST['etapa'], FILTER_SANITIZE_STRING);
        $nascimanto_aluno = filter_var($_POST['nascimento_aluno'], FILTER_SANITIZE_STRING);
        $escola_id  = filter_var($_POST['escola_id'], FILTER_SANITIZE_STRING);

        $dir = 'public/comprovantes/';
        $name_file = 'comprovante_de_renda_'.$nome.'_.'.pathinfo($_FILES['comprovante']['name'], PATHINFO_EXTENSION);
        if(!is_dir($dir)){
            mkdir($dir);

        }
        elseif (!is_file($dir.$name_file)){
            $name_file = 'comprovante_de_renda_'.$nome.'_.'.pathinfo($_FILES['comprovante']['name'], PATHINFO_EXTENSION);
            $comprovante = $dir.$name_file;

            $save = Container::getModel('Admin');
            $save->__set('nome', $nome);
            $save->__set('email', $email);
            $save->__set('cpf', $cpf);
            $save->__set('tel', $tel);
            $save->__set('estado_civil', $estado_civil);
            $save->__set('nascimento', $nascimento);
            $save->__set('sexo', $sexo);
            $save->__set('comprovante', $comprovante);
            $save->__set('senha', $senha);
            //dados alunos
            $save->__set('nome_aluno',$nome_aluno);
            $save->__set('cpf_aluno', $cpf_aluno);
            $save->__set('matricula',$matricula );
            $save->__set('sexo_aluno', $sexo_aluno);
            $save->__set('nascimento_aluno', $nascimanto_aluno);
            $save->__set('etapa_aluno', $etapa);
            $save->__set('escola_id', 1);
            $save->save_receivers();
            if($save->save_receivers() == 301){
                echo "erro";
            }else{
                move_uploaded_file($file['tmp_name'],$dir.$name_file);
                echo 201;
            }


        }






    }


}