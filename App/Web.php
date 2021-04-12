<?php
namespace App;
use Core\Router;
class Web extends Router{

    protected function initRoute()
    {
       $route['home'] = ['route'=>'/','controller'=>'IndexController','action'=>'auth'];
       $route['save_receiver'] = ['route'=>'/save.receiver','controller'=>'ReceiverController','action'=>'save_receiver'];
       $route['save_schools']  = ['route'=> '/save.school', 'controller'=>'SchoolController','action'=>'save_school'];


       $this->setRoute($route);
    }
}