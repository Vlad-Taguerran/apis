<?php


namespace App\Controller;


use Core\Model\Container;

class AdminController extends \Core\Controller\Controller
{
    public function index()
    {
        return $this->render('dashboard','dashboard');
    }
    //Rotina de horarios
    public function marcar_horario()
    {
        return $this->render('horarios','dashboard');
    }

    public function salvar_horario()
    {
        $id =   filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $nome = filter_var($_POST['data'], FILTER_SANITIZE_STRING);
        $sobrenome  =   filter_var($_POST['horario'], FILTER_SANITIZE_STRING);

       $horario = Container::getModel('Admin');

    }

    public function atualizar_horario()
    {

    }

    public function cancelar_horario()
    {

    }
    //Rotina de Clientes
    public function add_user()
    {

    }

    public function save_user()
    {

    }

    public function update_user()
    {

    }

    public function delete_user()
    {

    }
}