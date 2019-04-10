<?php
/**
 * User: TOLK  Date: 07.04.19
 *
 * Class not implement errors (404, etc)
 * TOLK-ru если задача была бы объемная я бы использовал symfony/routing
 */

class Route
{
    private static $controllerName = 'Default'; //TOLK-ru Можно вынести в конфиг, в рамках задачи не стал
    private static $actionName = 'index';

    static function run() {

        $parts = parse_url($_SERVER['REQUEST_URI']);
        $routes = explode('/', $parts['path']);

        if ( !empty($routes[1]) )
        {
            self::$controllerName = ucfirst($routes[1]);
        }
        if ( !empty($routes[2]) )
        {
            self::$actionName = $routes[2];
        }

        $controllerFileName = ucfirst(self::$controllerName).'Controller.php';

        $controllerPath = dirname(__FILE__)."/controllers/".$controllerFileName;
        if(file_exists($controllerPath))
        {
            include $controllerPath;
        } else {
            //TODO LOG
            echo "\n not found -> ".$controllerPath;
        }

        $controllerName = self::$controllerName.'Controller';
        $controller = new $controllerName;
        $action = self::$actionName;
        if(method_exists($controller, $action))
        {
            $controller->$action();
        }

    }
}