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

Route::get('/', ['as' => 'home','uses' => 'Controller@homepage']);
Route::get('/login',['as' => 'login_form','uses' => 'Controller@login']);
Route::post('/login', ['as'=>'login','uses' => 'Controller@auth']);
Route::get('/cadastro', ['uses' => 'Controller@cadastro']);
Route::post('/cadastro', ['as'=>'user.cadastro','uses' => 'Controller@auth']);
Route::get('/chat', ['uses' => 'Controller@chat']);
Route::get('/chat', ['uses' => 'Controller@chat']);
Route::get('/cadastro', ['as'=>'signup','uses' => 'Controller@criarConta']);
Route::post('/cadastro', ['as'=>'signup','uses' => 'Controller@store']);

/* ROTAS PARA O PERFIL */

Route::get('/perfil/{profile}', ['as' => 'perfil', 'uses' => 'Controller@perfil']);
Route::get('/perfil/{profile}/about', ['as' => 'perfil', 'uses' => 'Controller@perfil_about']);
Route::get('/perfil/{profile}/followers', ['as' => 'perfil', 'uses' => 'Controller@perfil_followers']);
Route::get('/perfil/{profile}/following', ['as' => 'perfil', 'uses' => 'Controller@perfil_following']);
Route::get('/perfil/{profile}/settings', ['as' => 'perfil', 'uses' => 'Controller@perfil_settings']);

/* ROTAS GERAIS PARA PAINEL DE CONTROLE */

Route::get('/admin/', ['as'=>'dashboard.index','uses' => 'DashboardController@index'], function () {})->middleware('auth');
Route::get('/admin/login',['as' => 'admin.login_form','uses' => 'DashboardController@admin_login'], function () {})->middleware('auth');
Route::post('/admin/login', ['as'=>'admin.login','uses' => 'DashboardController@admin_auth']);
Route::get('/logout', ['uses' => 'Controller@logout']);

/* ROTAS DOS ESPECIFICAS PAINEL DE CONTROLE */

Route::get('/admin/users', ['as'=>'admin.users','uses' => 'UsersController@index'], function () {})->middleware('auth');
Route::get('/admin/users/add', ['as'=>'admin.add_users','uses' => 'UsersController@adicionarUsuario'], function () {})->middleware('auth');
Route::post('/admin/users/add', ['as'=>'admin.add_users','uses' => 'UsersController@store'], function () {})->middleware('auth');
