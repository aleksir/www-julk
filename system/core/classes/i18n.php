<?php

class I18n {
    private static $lang = array();
    private static $localization;
    
    public static function init($localization) {
        setlocale(LC_ALL, $localization);
        
        preg_match('/^([a-zA-Z]{2,2}_[a-zA-Z]{2,2})-?.*$/', $localization, $match);
        
        I18n::$localization = $match[1];
        
        $i18n = I18n::$localization;
        
        require(APP_PATH.'i18n/'.$i18n.'/'.$i18n.'.php');
        
        I18n::$lang = $lang;
    }
    
    public static function t($string,$default="") {
        
        $a = split('\.',$string);
        
        $l = I18n::$lang;
        for ($i = 0; $i < count($a); $i++) {
            $l = $l[ $a[$i] ]; 
        }
        
        if ( empty($l) && $default == "") {
            return "I18n cannot find $string";
        }
        else
            return $l;
    }
    
    
    
    /**
     * Deprecated
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
}
    
?>