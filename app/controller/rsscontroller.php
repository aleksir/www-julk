<?php


Sees::require_controller("app");
    
/**
 * Description of rsscontroller
 *
 * @author Aleksi Rautakoski
 */
class rsscontroller extends AppController {
    public function action_index($args=NULL) {
        $this->say('Ei löydy vielä mitään.');
    }
}
?>
