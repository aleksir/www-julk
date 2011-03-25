<?php
/* 
 *  The MIT License
 * 
 *  Copyright (c) 2011 Aleksi Rautakoski.
 * 
 */

/**
 * Description of controller
 *
 * @author Aleksi Rautakoski
 */
abstract class Controller {
    protected $view;
    protected $context;
    function  __construct() {
        $this->context = array();
        $name = substr(get_class($this),0, -10 ); //controllerin nimesta vaan alku
        if ( empty ($this->view) )
            $this->view = $name;
    }
  
    protected function check_view () {
        return ( is_file( APP_PATH . 'view/'. $this->view .'.php') );
    }

    protected function say( $s, $target=NULL ) {
        if ($target != NULL) {
            $this->context[$target] .= $s;
        } else {
            $this->context['yield'] .= $s;
        }
    }
    
    /**
     * This method is called before its action and render
     */
    public function before() {
    }
    
    public function render() {
        $this->call_events();

        Sees::content_type();
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        if ( $this->check_view() ) {
            $A = $this->context; /* voidaan käyttää $A -muuttujaa */
            include(APP_PATH . 'view/'. $this->view .'.php');
        }
        else {
            echo $this->context['yield'];
        }
    }
    
    private function call_events() {
        foreach (array_keys($_POST) as $req) {
            if ( substr($req, 0, 6) == "event_" ) {
                if ( method_exists($this, $req) ) {
                    $this->$req();
                }
            }
        }
    }
}
?>
