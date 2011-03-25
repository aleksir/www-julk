<?php

$version = '0.1';

$settings = array(
    /*'url_path' => '/www-julk/',*/
    'base_url' => '/www-julk/',
    'default_lang' => 'fi_FI',
    'locale' => 'fi_FI.utf-8',
    'timezone' => 'Europe/Helsinki',
    
    'db' => array(
        'type' => 'sqlite', /* sqlite or mysql */
        'table_prefix' => "",
        /* sqlite settings */
        'sqlite_location' => "app/db/sqlite.sdb", /* relative to root */
        /* mysql settings */
        'mysql_server' => "",
        'mysql_name' => "",
        'mysql_username' => "",
        'mysql_password' => "",
    ),
);

?>