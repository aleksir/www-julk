<?php

/**
 * Description of Module
 *
 * @author Aleksi Rautakoski
 */
abstract class Module {
    /**
     * @var string Name of component
     */
    public static $name;
    
    /**
     * @var string Version of component
     */
    public static $version;
    /**
     * @var string Description of component
     */
    public static $description;
    
    /**
     *
     * @var string Package where component belongs
     */
    public static $package = 'Other';
    
    /**
     * @var array Dependency list of component
     */
    public static $dependencies = array();
    
    /**
     * Init component ready for use
     */
    public static function init() {
        
    }
    
    /**
     * Render this component
     */
    abstract public function render( $args = NULL );
    
    /**
     * Override this method if you want own installer.
     * @return ComponentInstaller Installer to install component
     */
    public static function installer() {
        return new ComponentInstaller();
    }
}
?>
