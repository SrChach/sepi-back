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

$router->get('/permisos', 'PermisoController@index');
$router->get('/permisos/{permisos}', 'PermisoController@show');

$router->get('/roles', 'RolController@index');
$router->get('/roles/{roles}', 'RolController@show');

$router->get('/usuarios', 'UsuarioController@index');
$router->get('/usuarios/{usuarios}', 'UsuarioController@show');

$router->get('/firmas', 'FirmaController@index');
$router->get('/firmas/{firmas}', 'FirmaController@show');