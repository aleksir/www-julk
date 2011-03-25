<?php

/**
 * Description of Request
 *
 * @author Aleksi Rautakoski
 */
class Request {

    public static $url;
    public static $controller;
    public static $controller_name;
    public static $action;
    public static $param;
    public static $event;

    public function __construct() {
        
    }

    public static function factory() {
        SEES::content_type("text/txt");
        foreach (Route::$routes as $name => $route) {
            if ( $p = $route->matches(Request::$url) ) {
               
                Request::$controller_name = $p['controller'];
                Request::$action = $p['action'];
                unset($p['controller'], $p['action']); //TODO: ei poista kokonaan
                Request::$param = $p;
                
                return new Request();
            }
        }
        
        throw new HttpException("404");
    }

    public function execute() {
        $file = APP_PATH . 'controller/' . Request::$controller_name . 'controller.php';
        
        if (!is_file($file)) {
            throw new HttpException("404");
        }
        
        require_once($file);
        
        
        $class_name = Request::$controller_name . 'Controller';
        
        if ( !class_exists($class_name) ) {
            throw new SeesException("$class_name not found");
        }
        
        Request::$controller = new $class_name;
        
        $action = "action_" . Request::$action;
        
        if (method_exists(Request::$controller, $action)) {
            Request::$controller->before();
            Request::$controller->$action(Request::$param);
        } else {
            throw new HttpException("404");
        }
        unset($action);
        
        Request::$controller->render();
                
        return $this;
    }

}

?>
