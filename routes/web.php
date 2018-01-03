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

/* ROTAS PARA USUÁRIO COMUM */

Route::get('/', ['uses' => 'Controller@homepage']);
Route::get('/login',['as' => 'login_form','uses' => 'Controller@login']);
Route::post('/login', ['as'=>'login','uses' => 'Controller@auth']);
Route::get('/cadastro', ['uses' => 'Controller@cadastro']);
Route::post('/cadastro', ['as'=>'user.cadastro','uses' => 'Controller@auth']);
Route::get('/chat', ['uses' => 'Controller@chat']);
Route::get('/chat', ['uses' => 'Controller@chat']);
Route::get('/perfil', ['as' => 'perfil', 'uses' => 'Controller@perfil']);

/* ROTAS GERAIS PARA PAINEL DE CONTROLE */

Route::get('/admin/', ['as'=>'dashboard.index','uses' => 'DashboardController@index'], function () {})->middleware('auth');
Route::get('/admin/login',['as' => 'admin.login_form','uses' => 'DashboardController@admin_login']);
Route::post('/admin/login', ['as'=>'admin.login','uses' => 'DashboardController@admin_auth']);
Route::get('/logout', ['uses' => 'DashboardController@logout'], function () {})->middleware('auth');

/* ROTAS DOS ESPECIFICAS PAINEL DE CONTROLE */

Route::get('/admin/users', ['as'=>'admin.users','uses' => 'UsersController@index'], function () {})->middleware('auth');
Route::get('/admin/users/add', ['as'=>'admin.add_users','uses' => 'UsersController@adicionarUsuario'], function () {})->middleware('auth');
Route::post('/admin/users/add', ['as'=>'admin.add_users','uses' => 'UsersController@store'], function () {})->middleware('auth');
