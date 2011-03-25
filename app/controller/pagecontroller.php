<?php
    
class PageController extends AppController {
    protected $view = 'home';
    public function action_show($args=NULL) {
        $this->say('Page','title');
        
    }
}

?>