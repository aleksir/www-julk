<?php
/**
 * Requires settings.php that contains settings for site.
 */
include(APP_PATH . "settings.php");

define('BASE_URL', $settings['base_url']);

/**
 * Include core classes
 */
require(SYS_PATH.'core/includes/includes.php');

/**
 * Default timezone read from settings.php
 */
date_default_timezone_set( ($settings['timezone'] ? $settings['timezone'] : 'UTC') );

/**
 * Locale from settings.php
 */
setlocale(LC_ALL, ($settings['locale'] ? $settings['locale'] : 'en-US.utf-8'));

Session::init();

/**
 * Init
 * @see system.Sees
 */
Sees::init($settings);

/**
 * Ini DataBase ready for connections
 * @see system.db.Database
 */
DataBase::init($settings['db']);

/**
 * include routes.php
 */
include(APP_PATH . "routes.php");
        //Route::$home_controller = ($settings['home']) ? $settings['home'] : 'home';

unset($settings);
    
Request::$url = $_GET['site'];

?>
