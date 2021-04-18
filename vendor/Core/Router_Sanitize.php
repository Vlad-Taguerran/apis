<?php


namespace Core;


use Exception;

abstract class Router_Sanitize
{
    private static $params;

    /**
     * @param $route
     * @param $path
     * @return false|int
     */
    protected static function sanitizeURL($route,$path)
    {




       
            preg_match_all('/\{([^\}]*)\}/',$route,$arr);

            // echo $route."<br>";
            $regex = str_replace('/', '\/', $route);

            foreach ($arr[0] as $k => $var){
                $replacement = '([a-zA-Z0-9\-\_\ ]+)';
                $regex = str_replace($var, $replacement, $regex);
            }
            $regex =  preg_replace('/{([a-zA-Z]+)}/', '([a-zA-Z0-9+])', $regex);
            $result =  preg_match('/^' . $regex . '$/', $path,$parametro);
       

        self::$params = $parametro;

        if($result >= 1){
            return self::$params;
        }
        return $path;
    }

    protected static function sanitize($controller,  $parrams = null): void
    {
        $class = strstr($controller,"@",'true');
        $class = "App\\Controller\\".ucfirst($class);
        $ctl  = new $class;
        $action = strstr($controller,"@");
        $action = str_replace('@',"",$action);


        try {
            if (isset($parrams)){
                $ctl->$action($parrams);
            }else{
                $ctl->$action();
            }
        }catch (Exception $error){
            echo $error->getMessage();
        }

    }

    protected static function filterMethod( $result, string $method, string $controller, array $type)
    {
        if (is_array($result)){
            try {
                if($method == $type[0] || $method == $type[1]) {

                    self::sanitize($controller,$result);
                }

            }catch (Exception $error){
                echo $error->getMessage();
            }
        }else {
            try {
                if ($method == $type[0] || $method == $type[1]) {

                    self::sanitize($controller);
                }

            } catch (Exception $error) {
                echo $error->getMessage();
            }
        }
    }
}