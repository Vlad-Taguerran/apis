<?php


namespace App\Controller\school;


use Core\Model\Container;

class SchoolController extends \Core\Controller\Controller
{
    public function save_school()
    {
        if(isset($_POST)){
            $escola = filter_var($_POST['escola'],FILTER_SANITIZE_STRING);
            $estado  = filter_var($_POST['estado'], FILTER_SANITIZE_STRING);
            $municipio = filter_var($_POST['municipio'],FILTER_SANITIZE_STRING);
            $etapa = filter_var($_POST['etapa'], FILTER_SANITIZE_STRING);
            $inep = filter_var($_POST['inep'], FILTER_SANITIZE_STRING);
            $nome_gestor = filter_var($_POST['nome_gestor'], FILTER_SANITIZE_STRING);
            $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_STRING);
            $tel_escola = filter_var($_POST['tel_escola'], FILTER_SANITIZE_STRING);
            $cargo = filter_var($_POST['cargo'], FILTER_SANITIZE_STRING);
            $matricula = filter_var($_POST['matricula'], FILTER_SANITIZE_STRING);
            $email_escola = filter_var($_POST['email_escola'], FILTER_SANITIZE_STRING);
            $save = Container::getModel('Admin');

            $save->__set('escola', $escola);
            $save->__set('estado', $estado);
            $save->__set('municipio', $municipio);
            $save->__set('etapa', $etapa);
            $save->__set('inep', $inep);
            $save->__set('nome_gestor', $nome_gestor);
            $save->__set('cpf', $cpf);
            $save->__set('tel_escola', $tel_escola);
            $save->__set('cargo', $cargo);
            $save->__set('matricula', $matricula);
            $save->__set('email_escola', $email_escola);
            $save->save_school();

        }else{
            echo 301;
        }

    }
    public function select_school()
    {
        $schools = Container::getModel('SchholModel');

        return json_encode($schools);
    }
}