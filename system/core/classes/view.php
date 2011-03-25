<?php
/* 
 *  The MIT License
 * 
 *  Copyright (c) 2011 Aleksi Rautakoski.
 * 
 */

/**
 * Template engine
 *
 * @author Aleksi Rautakoski
 */

 class View {
     private $file;
     
     public function __construct($file_name) {
        if ( file_exists($filename) ) {
            $this->file = $file_name;
        }
     }
     public function render() {
        //TODO: render
     }
 }

?>
