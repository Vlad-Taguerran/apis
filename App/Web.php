<?php
namespace App;
use Core\Router;
class Web extends Router{

    protected function initRoute()
    {
       $route['home'] = ['route'=>'/','controller'=>'IndexController','action'=>'index'];
       $route['login'] = ['route'=>'/auth','controller'=>'IndexController','action'=>'auth'];
       $route['dashboard'] = ['route'=>'/dashboard','controller'=>'AdminController','action'=>'index'];

       $this->setRoute($route);
    }
}