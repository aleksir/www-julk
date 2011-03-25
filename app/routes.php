<?php
/**
 * Set up your route settings here.
 * The upper a set appears the higher priority it has 
 *
 * Variables: :controller|:action|:id|:format
 * You can use also normal regexp-syntax
 *
 */
Route::set('login','kirjaudu')
    ->controller('session')
    ->action('login');
Route::set('logout','ulos')
    ->controller('session')
    ->action('logout');
    
Route::set('uutiset','uutiset/:id')
    ->controller('uutiset')
    ->action('index');
    
/**
 * Set home controller
 */
Route::set('root')
    ->controller('home')
    ->action('index');

Route::set('pages',':page')
    ->controller('page')
    ->action('show');
    
/**
 * Default route
 */
Route::set('1',':controller/:action/:id');
Route::set('2',':controller/:action/:id.:format');
Route::set('3',':action/:id.:format')->controller('home');

$routes = array(
                'home' => array('home'),
                );

    
    
?>