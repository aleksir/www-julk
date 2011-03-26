<?php

class URL {
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
     * Palauttaa urlin parametrina annettuun controlleriin ja actioniin.
     * Jos $action on tyhjä niin pelkkään controlleriin (=index).
     * TODO: Ei tsekkaa onko controlleri oikeasti olemassa
     */
    public static function url_to($controller, $method=NULL, $param=NULL ) {
        return empty($method) ? BASE_URL.$controller : BASE_URL.$controller.'/'.$method.'/'.$param;
    }
    
    public static function redirect_to($path="") {
        Header( "Location: ".BASE_URL."$path" );
        die();
    }
    
    /*
     * Jos on tarve saada osoitteita public-hakemiston tiedostoihin niin
     * tämä funktio auttaa
     */
    public static function file( $file ) {
        return BASE_URL . $file;
    }
}

?>