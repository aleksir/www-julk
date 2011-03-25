<?php
/* 
 *  Copyright (c) 2011 Aleksi Rautakoski.
 */

class Uutinen {
    private $id;
    
    protected $properties = array(
        'otsikko' => NULL,
        'teksti' => NULL,
        'tagit' => array(),
        'aika' => NULL,
    );

    public function __construct($otsikko, $teksti , $aika, $tagit = array(), $id = NULL) {
        $this->id = $id;
        $this->otsikko = $otsikko;
        $this->teksti = $teksti;
        $this->tagit = $tagit;
        $this->aika = $aika;
    }

    public function add_tagi($tagi) {
        array_push($this->tagit, $tagi);
    }

    public function  __set($name,  $value) {
        $this->properties[$name] = $value;
    }
    public function  __get($name) {
        if ( $name == id ) {
            return $this->id;
        }
        else {
            return $this->properties[$name];
        }
    }
}

?>
