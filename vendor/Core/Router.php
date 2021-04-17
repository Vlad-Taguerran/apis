<?php
namespace Core;




use function MongoDB\BSON\toJSON;

abstract class Router{
    private $route;


    abstract protected function initRoute();

    public static function getUrl(){
        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }
    //teste

    private static function sanitizeURL($route)
    {

        $route = preg_match_all('/\{([^\}]*)\}/','/get/receiver/all/{teste}/{teste2}',$arr);
       // echo $route."<br>";
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

    /**
     * @param $controller
     * @return void
     */

    private static function sanitize($controller): void
    {
        $class = strstr($controller,"@",'true');
        $class = "App\\Controller\\".ucfirst($class);
        $ctl  = new $class;
        $action = strstr($controller,"@");
        $action = str_replace('@',"",$action);
        $ctl->$action();
    }

    /**
     * @param $routes String
     * @param $controller String
     */

    public static function GET(string $routes , string $controller)
    {


        $method = $_SERVER['REQUEST_METHOD'];

            if($routes == self::getUrl()){
                try {
                    if($method == 'get' || $method == 'GET'){

                        self::sanitize( $controller);
                        self::sanitizeURL($routes);
                    }
                }catch (\Exception $exception){
                   echo  $exception->getMessage();
                }
            }




    }

    /**
     * @param string $routes
     * @param string $controller
     */

    public static function POST(string $routes , string $controller)
    {

        $method = $_SERVER['REQUEST_METHOD'];

        if($routes == self::getUrl()){
            try {
                if($method == 'post' || $method == 'POST'){

                    self::sanitize($controller);
                }
            }catch (\Exception $exception){
                echo  $exception->getMessage();
            }
        }

    }


    /**
     * @param string $routes
     * @param string $controller
     */
    public static function PUT(string $routes, string $controller)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if($routes == self::getUrl()){
            try {
                if($method == 'put' || $method == 'PUT'){

                    self::sanitize($controller);
                }
            }catch (\Exception $exception){
                echo  $exception->getMessage();
            }
        }
    }

    /**
     * @param string $routes
     * @param string $controller
     */
    public static function DELETE(string  $routes, string $controller)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if($routes == self::getUrl()){
            try {
                if($method == 'delete' || $method == 'DELETE'){

                    self::sanitize($controller);
                }
            }catch (\Exception $exception){
                echo  $exception->getMessage();
            }
        }
    }





}