<?php
/**
 * Description of Route
 *
 * @author Aleksi Rautakoski
 */
class Route {
    public static $home_controller;
  
    public static $routes = array();
  
    public static $current;
    
    protected $_controller;
    protected $_action;
    
    public $regex;
    
    public function __construct($uri) {
        if ( empty($uri) ) {
            return;
        }
        
        $this->regex = $uri;
    }
    
    /**
     * Return regex
     */
    private function generate_regex() {
        $this->regex = preg_replace(array('/\//','/\./'),array('\/?','\\.'),$this->regex);
        $this->regex = "/^".preg_replace_callback('/:(controller|action|id|format|\w*)/', function($match) {
                            return '(?P<'.$match[1].'>\w*)';
            }, $this->regex ) ."\/?$/i" ;
        
    } 
    
    /**
     * If not action then it's index.
     */
    public function action($action_name) {
        $this->_action = $action_name;
        return $this;
    }
    
    public function controller($controller_name) {
        $this->_controller = $controller_name;
        return $this;
    }
    
    
    /**
     *
     * @return array('controller'=>controller,'action'=>action,'id'=>id) if matches or NULL
     */
    public function matches($uri) {
        $this->generate_regex();
        
        if ( preg_match($this->regex,$uri,$m) ) {
            Route::$current = $this;
            
            $a = array();
            
            /*
             * Put controller,action array $m
             */
            $m['controller'] = $m['controller'] ? $m['controller'] : $this->_controller;
            $m['action'] = $m['action'] ? $m['action'] : $this->_action; 
            
            return $m;
        }
        
    }
  
    /**
     * @param $uri Something like :controller/:action/:id
     * @return new Route object
     */
    public static function set($name, $uri=NULL) {
        $route = new Route($uri);
        Route::$routes[$name] = $route;
        return $route;
    }
}

?>
