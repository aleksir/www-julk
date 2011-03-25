<?php
/* 
 *  Copyright (c) 2011 Aleksi Rautakoski.
 */
Sees::import("app/model/uutiset.php");

Sees::require_controller("app");
    
class PalvelutController extends AppController {
    protected $view = 'home';
    
    public function action_index($args=NULL) {
        $this->say('Palvelut','title');

        $uutiset = new Uutiset();
        $this->context['uutiset'] = $uutiset->hae_uusimmat();
    }
}

?>
