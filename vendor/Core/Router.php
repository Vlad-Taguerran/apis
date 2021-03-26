<?php
namespace Core;


abstract class Router{
    private $route;

    public function __construct()
    {
        $this->initRoute();
        $this->run($this->getUrl());
    }

    abstract protected function initRoute();

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $route
     */
    public function setRoute($route): void
    {
        $this->route = $route;
    }
    public function getUrl(){
        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }
    public function run($routes){
        foreach ($this->getRoute() as $key => $route){
            if($routes == $route['route']){

                $class = "App\\Controller\\".ucfirst($route["controller"]);
                $controller = new $class;
                $action = $route['action'];
                $controller->$action();

            }
        }
    }
}