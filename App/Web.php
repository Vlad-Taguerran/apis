<?php
namespace App;
use Core\Router;
class Web extends Router{

    protected function initRoute()
    {
       $route['home'] = ['route'=>'/','controller'=>'IndexController','action'=>'auth'];
       $route['save_receiver']    = ['route'=>'/save_receiver','controller'=>'AdminController','action'=>'save_receiver'];



       $this->setRoute($route);
    }
}