<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->get('directorios', ['as' => 'directorios', 'uses' => 'DirectorioController@index']);
$router->get('directorios/{id}', ['as' => 'directorios.show', 'uses' => 'DirectorioController@show']);
$router->post('directorios', ['as' => 'directorios.store', 'uses' => 'DirectorioController@store']);
