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

$router->get('/permisos', 'PermisoController@index');
$router->get('/permisos/{permisos}', 'PermisoController@show');
$router->post('/permisos', 'PermisoController@store');
$router->put('/permisos/{permisos}', 'PermisoController@update');
$router->patch('/permisos/{permisos}', 'PermisoController@update');

$router->get('/roles', 'RolController@index');
$router->get('/roles/{roles}', 'RolController@show');
$router->post('/roles/{roles}', 'RolController@store');
$router->put('/roles/{roles}', 'RolController@update');
$router->patch('/roles/{roles}', 'RolController@update');

$router->get('/roles/{rol_id}/permisos', 'PermisoRolController@index');
$router->post('/roles/{rol_id}/permisos/{permiso_id}', 'PermisoRolController@store');
$router->delete('/roles/{rol_id}/permisos/{permiso_id}', 'PermisoRolController@destroy');

// falta borrar un usuario
$router->get('/usuarios', 'UsuarioController@index');
$router->get('/usuarios/{usuarios}', 'UsuarioController@show');
$router->post('/usuarios', 'UsuarioController@store');
$router->put('/usuarios/{usuario_id}', 'UsuarioController@update');
$router->patch('/usuarios/{usuario_id}', 'UsuarioController@update');

// Quitarle rol_id y ponerle nombre del rol al usuario
$router->get('/roles/{rol_id}/usuarios', 'RolUsuarioController@index');

// Usuario/Rol
// cuando se cree un usuario, se crea sin rol. El rol se asigna después
$router->put('/usuarios/{usuario_id}/roles/{rol_id}', 'UsuarioRolController@update');
$router->patch('/usuarios/{usuario_id}/roles/{rol_id}', 'UsuarioRolController@update');
$router->delete('/usuarios/{usuario_id}/roles', 'UsuarioRolController@delete');

$router->get('/firmas', 'FirmaController@index');
$router->get('/firmas/{firmas}', 'FirmaController@show');

// usuariofirma -> crear/editar