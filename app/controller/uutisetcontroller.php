<?php
/* 
 *  Copyright (c) 2011 Aleksi Rautakoski.
 * 
 */
Sees::import("app/model/uutiset.php");
Sees::require_controller("app");

class UutisetController extends AppController {
    private $uutiset;
    public function __construct() {
        $this->uutiset = new Uutiset();
        
        parent::__construct();
    }
    
    public function action_index($args=NULL) {
        //$this->set_view("suunnitelma");
        $this->say('Uutiset','title');

        $u = $this->uutiset->hae_uusimmat();
        $this->say( $u[0]->otsikko );
    }
    public function action_uutinen($args=NULL) {
        $id = ( $args[0] != NULL) ? $args[0] : 1;
        
        $this->say(
'<html>
    <head></head>
    <body>');

        $this->say('Testing3 ' . $id);

        $this->say('
    </body>
</html>');
    }

    public function evet_edit() {
        
    }

    public function event_save() {
        $this->say('fasd');
    }
}

?>
