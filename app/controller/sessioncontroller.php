<?php
Sees::require_controller("app");

class SessionController extends AppController {
    public function action_login($args=NULL) {
        Sees::redirect_to();
    }
    public function action_logout($args=NULL) {
        Sees::redirect_to();
    }
}

?>