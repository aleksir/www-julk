<?php
/* 
 *  Copyright (c) 2011 Aleksi Rautakoski.
 */
    Sees::require_controller("app");
Sees::import("app/model/uutiset.php");
Sees::import("components/aeditabletext.php");

/**
 * Description of homecontroller
 *
 * @author Aleksi Rautakoski
 */
class HomeController extends AppController {
    public function __construct() {
        parent::__construct();
        
        global $settings;
        $db = new DataBase($settings['db']);

        $this->context['text_1-1'] = new AEditableText($db);
        $this->context['text_1-2'] = new AEditableText($db);
        $this->context['text_1-3'] = new AEditableText($db);
    }
    public function action_index($args=NULL) {
        
        $this->context['text_1-1']->sivu = 1;
        $this->context['text_1-1']->kohta = 1;
        $this->context['text_1-1']->view = 2;

        $this->context['text_1-2']->sivu = 1;
        $this->context['text_1-2']->kohta = 2;
        $this->context['text_1-2']->view = AEditableText::ACCESS;

        $this->context['text_1-3']->sivu = 1;
        $this->context['text_1-3']->kohta = 3;
        $this->context['text_1-3']->view = AEditableText::ACCESS;

        /*echo '<?xml version="1.0" encoding="UTF-8"?>';*/
        $this->say(Sees::string('Etusivu'),'title');

        $uutiset = new Uutiset();
        $this->context['uutiset'] = $uutiset->hae_uusimmat();
    }
    public function action_referenssit($args=NULL) {
        $this->say("Referenssit",'title');
    }

    public function event_edit() {
        $sivu = $_POST['sivu'];
        $kohta = $_POST['kohta'];

        $this->context['text_'.$sivu.'-'.$kohta]->view = AEditableText::EDIT;
    }

    public function event_save() {
        $sivu = $_POST['sivu'];
        $kohta = $_POST['kohta'];
        $teksti = $_POST['teksti'];

        $this->context['text_'.$sivu.'-'.$kohta]->save($teksti);
    }
}
?>
