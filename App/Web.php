<?php
namespace App;
use Core\Router;
class Web extends Router{

    protected function initRoute()
    {
       $route['home'] = ['route'=>'/','controller'=>'IndexController','action'=>'index'];
       $route['login'] = ['route'=>'/auth','controller'=>'IndexController','action'=>'auth'];
       $route['logout'] = ['route'=>'/logout','controller'=>'IndexController','action'=>'logout'];
       $route['dashboard'] = ['route'=>'/dashboard','controller'=>'AdminController','action'=>'index'];
       $route['dashboard-user'] = ['route'=>'/dashboard-usuario','controller'=>'UserController','action'=>'index'];
       //Rotina de horarios
       $route['marcar-horario'] = ['route' => '/marcar-horario', 'controller'=> 'AdminController','action'=>'marcar_horario'];
       $route['salvar-horario'] = ['route'=>'/marcar-horario.salvar','controller'=> 'AdminController', 'action'=>'save_horario'];
       $route['alterar-horario'] = ['route' => '/alterar-horario','controller' => 'AdminController', 'action' => 'update_horario'];
       $route['cancelar-horario']   =   ['$route'=>'/cancelar-horario', 'controller'=>'AdminController', 'action'=>'delete_horario'];
       //Rotina Clientes
       $route['add-user'] =  ['route'=>'/add-user', 'controller' => 'AdminController', 'action' => 'add_user'];
       $route['save-user'] =  ['route'=>'/add-user.salvar', 'controller' => 'AdminController', 'action' => 'save_user'];
       $route['update-user'] =  ['route'=>'/add-user.atualizar', 'controller' => 'AdminController', 'action' => 'update_user'];
       $route['delete-user'] =  ['route'=>'/add-user.delete', 'controller' => 'AdminController', 'action' => 'delete_user'];


       $this->setRoute($route);
    }
}