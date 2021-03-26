<?php


namespace App\Controller;


use App\Connection;
use Core\Controller\Controller;
use Core\Model\Container;
use http\Header;

class IndexController extends Controller
{
    public function index()
    {
        $this->render("home","layout");


    }

    public function auth()
    {
        $email  =   $_POST['email'];
        $senha  =  md5( $_POST['senha']);
        $email  =   filter_var($email,FILTER_SANITIZE_EMAIL);
        $senha  =   filter_var($senha,FILTER_SANITIZE_STRING);
        $login = Container::getModel("Users");
        $login->__set('email',$email);
        $login->__set('senha',$senha);
        $login->auth();

       if ($login->__get('senha') == $senha && $login->__get('email') == $email){
           session_start();
            $_SESSION['id'] = $login->__get('id');
            $_SESSION['nome'] = $login->__get('nome');

            Header('location: /dashboard');
       }else{
           header('location: /');
       }
    }
}