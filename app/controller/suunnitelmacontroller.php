<?php
/* 
 *  Copyright (c) 2011 Aleksi Rautakoski.
 * 
*/
Sees::require_controller("app");

class SuunnitelmaController extends AppController {
    public function action_index($args=NULL) {
        $this->say('Suunnitelma','title');
    }
}

?>
