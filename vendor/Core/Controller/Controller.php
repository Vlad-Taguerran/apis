<?php
namespace Core\Controller;

abstract class Controller{
    private $view;

    public function __construct(){
        $this->view = new \stdClass();
    }

     protected function render($view,$theme = null){
         $this->view->page = $view;
         require_once "../App/views/layouts/".$theme.".phtml";

     }

     public function content(){
         $class = get_class($this);

         $class = str_replace("App\\Controller\\","",$class);
         $path = strtolower(str_replace("Controller","",$class));

         require_once "../App/views/".$this->view->page.".phtml";
     }
}