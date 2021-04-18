<?php
namespace Core;






use Exception;

abstract class Router extends Router_Sanitize {

    /**
     * @return array|false|int|string|null
     */

    private static function getUrl(){
        return parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    }



    /**
     * @param $routes String
     * @param $controller string
     */

    public static function GET(string $routes , string $controller)
    {

        $method = $_SERVER['REQUEST_METHOD'];
        $type = ['GET','get'];
        $result = self::sanitizeURL($routes,self::getUrl());
        self::filterMethod($result,$method,$controller, $type);

    }

    /**
     * @param string $routes
     * @param string $controller
     */

    public static function POST(string $routes , string $controller)
    {

        $method = $_SERVER['REQUEST_METHOD'];
        $type = ['POST','post'];
        $result = self::sanitizeURL($routes,self::getUrl());
        self::filterMethod($result,$method,$controller, $type);

    }


    /**
     * @param string $routes
     * @param string $controller
     */
    public static function PUT(string $routes, string $controller)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $type = ['PUT','put'];
        $result = self::sanitizeURL($routes,self::getUrl());
        self::filterMethod($result,$method,$controller, $type);
    }

    /**
     * @param string $routes
     * @param string $controller
     */
    public static function DELETE(string  $routes, string $controller)
    {
        $method = $_SERVER['REQUEST_METHOD'];

        $type = ['DELETE','delete'];
        $result = self::sanitizeURL($routes,self::getUrl());
        self::filterMethod($result,$method,$controller, $type);
    }





}