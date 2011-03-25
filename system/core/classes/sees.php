<?php
/* 
 *  The MIT License
 * 
 *  Copyright (c) 2011 Aleksi Rautakoski.
 * 
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 * 
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 * 
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
*/

defined( 'APP_PATH' ) or die( "[".__FILE__."] APP_PATH not defined");
defined( 'COMP_PATH' ) or die("[".__FILE__."] COMP_PATH not defined");
defined( 'BASE_URL' ) or die("[".__FILE__."] BASE_URL not defined");

/**
 * Description of Sees
 *
 * @author Aleksi Rautakoski
 * @package system
 */
class Sees {
    public static $localization;
    public static $lang;
    
    public static function init( $settings=array() ) {
        
    }
    
    /**
     * 
     * @param type $string
     * @return type 
     */
    public static function string($string) {
        if ( !Sees::$lang ) {
            $i18n = 'fi_FI';
            require(APP_PATH.'i18n/'.$i18n.'/'.$i18n.'.php');
            Sees::$lang = $lang;
        }
        
        return Sees::$lang[$string] ? Sees::$lang[$string] : $string;
    }

    /**
     * Send Content-Type header.
     * @param $type Content-Type, if null then type is application/xhtml+xml
     */
    public static function content_type($type = NULL) {
        if ( !empty($type) ) {
            header("Content-Type: $type; charset=UTF-8");
        } else {   
            if(isset($_SERVER["HTTP_ACCEPT"]) && stristr($_SERVER["HTTP_ACCEPT"], "application/xhtml+xml")) {
                header('Content-Type: application/xhtml+xml; charset=UTF-8');
            }
            else {
                header('Content-Type: text/html; charset=UTF-8');
            }
        }
    }

    /*
     * Palauttaa script-tagin, joka viittaa parametrina annettuun tiedostoon.
     * Tiedoston pitää sijaita public/scripts-hakemiston alla. Tsekkaa löytyykö
     * js-tiedosto ja palauttaa virheen jos ei löydy.
    */
    public static function javascript( $scriptname ) {
        $file = ROOT_PATH . "public/scripts/" . $scriptname . ".js";
        if (is_file($file)) {
            return '<script type="text/javascript" src="'.BASE_URL.'scripts/'. $scriptname .'.js"></script>'."\n";
        }
        else {
            return 'Javascript: '.$scriptname.' not found.';
        }
    }

    /*
     * Palauttaa link-tagin, joka viittaa parametrina annettuun tiedostoon.
     * Tiedoston pitää sijaita public/styles-hakemiston alla. Tsekkaa löytyykö
     * tyylitiedosto ja palauttaa virheen jos ei löydy.
    */
    static function stylesheet( $stylename ) {
        //TODO jos halutaan css-lisämäärityksiä
        $file = ROOT_PATH . "public/styles/" . $stylename . ".css";
        if (is_file($file)) {
            return '<link rel="stylesheet" type="text/css" href="' . BASE_URL . 'styles/'. $stylename. '.css" />'."\n";
        }
        else {
            return 'Stylesheet: '.$stylename.' not found.';
        }
    }

    /*
     * Jos on tarve saada osoitteita public-hakemiston tiedostoihin niin
     * tämä funktio auttaa
    */
    public static function file( $file ) {
        return BASE_URL . $file;
    }


    /*
    * Palauttaa urlin parametrina annettuun controlleriin ja actioniin.
    * Jos $action on tyhjä niin pelkkään controlleriin (=index).
    * TODO: Ei tsekkaa onko controlleri oikeasti olemassa
    */
    public static function url_to($controller, $method=NULL, $param=NULL ) {
        return empty($method) ? BASE_URL.$controller : BASE_URL.$controller.'/'.$method.'/'.$param;
    }

    /* Muuten sama kuin require_once, mutta polku voidaan kirjoittaa juuresta */
    public static function import($file) {
        require_once(ROOT_PATH.$file);
    }
    public static function core_import($file) {
        require_once(SYS_PATH.'core/classes/'.$file);
    }

    public static function require_helper($name) {
        require_once(APP_PATH."helper/".$name.".php");
    }
    
    public static function require_controller($name) {
        require_once(APP_PATH."controller/".$name."controller.php");
    }
    
    public static function component($name, $args = NULL ) {

        if ( is_object($name) ) {
            $component = $name;
        } elseif (is_string($name)) {
            require_once(COMP_PATH. strtolower($name) .".php");
            $component = new $name();


        } else {
            throw new ComponentException("Illegal parametres for component.");
        }
        $component->render($args);
    }
    
    public static function redirect_to($path="") {
        Header( "Location: ".BASE_URL."$path" );
        die();
    }
}
?>
