<?php
class AppController extends Controller {
    
    public function redirect_back_or_default($path) {
        if ( Session::$stored_location ) {
            Session::redirect_stored_location();
        }
        Sees::redirect_to($path);
    }
}
    
    
?>