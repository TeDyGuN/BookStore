<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/panel', 'HomeController@plantilla');

// Gestion de Usuario
Route::get('/user/modificar', 'UsuarioController@viewModificar');
Route::post('/user/modificar/save', 'UsuarioController@saveModificar');
Route::post('/user/modificarUsuario', 'UsuarioController@viewModificarUsuario');
Route::post('/user/saveModificarUsuario', 'UsuarioController@modificar');
Route::Resource('users', 'UserController');

//Categoria
Route::get('categoria', 'CategoriaController@index');
Route::post('categoria/save', 'CategoriaController@save');
Route::get('categorias/{id}', 'LibroController@categoria');

//Libros
Route::get('/crear-libro', array(
    'as'  => 'createLibro',
    'middleware' => 'auth',
    'uses'  => 'LibroController@createLibro'
  ));

Route::get('/imagen/{archivo}', 'LibroController@getImage');
Route::post('/libro/save', 'LibroController@saveLibro');
Route::get('/libro/{id}', 'LibroController@getDescription');
Route::post('/orden', 'LibroController@orden');
Route::post('/ordenCompra', 'LibroController@crearOrden');