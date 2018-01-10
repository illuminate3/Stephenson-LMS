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

Route::get('/cadastro', ['as'=>'signup','uses' => 'UsersController@criarConta']);
Route::post('/cadastro', ['as'=>'signup','uses' => 'UsersController@store']);

Route::get('/login',['as' => 'login_form','uses' => 'UsersController@login']);
Route::post('/login', ['as'=>'login','uses' => 'UsersController@auth']);

Route::get('/chat', ['uses' => 'Controller@chat']);

/* ROTAS PARA O PERFIL */

Route::get('/perfil/{profile}', ['as' => 'perfil', 'uses' => 'Controller@perfil']);
Route::get('/perfil/{profile}/about', ['as' => 'perfil', 'uses' => 'Controller@perfil_about']);
Route::get('/perfil/{profile}/followers', ['as' => 'perfil', 'uses' => 'Controller@perfil_followers']);
Route::get('/perfil/{profile}/following', ['as' => 'perfil', 'uses' => 'Controller@perfil_following']);
Route::get('/perfil/{profile}/settings', ['as' => 'perfil', 'uses' => 'Controller@perfil_settings']);

/* ROTAS PARA OS CURSOS */
Route::get('/cursos', ['as'=>'courses.index','uses' => 'CoursesController@index']);

/* ROTAS PARA OS TUTORIAIS */
Route::get('/tutoriais', ['as'=>'tutorials.index','uses' => 'TutorialsController@index']);
Route::get('/tutorial/{video}', ['as'=>'tutorials.single','uses' => 'TutorialsController@single']);

/* ROTAS GERAIS PARA PAINEL DE CONTROLE */

Route::get('/admin/', ['as'=>'dashboard.index','uses' => 'DashboardController@index'], function () {})->middleware('auth');

Route::get('/admin/login',['as' => 'admin.login_form','uses' => 'UsersController@admin_login']);
Route::post('/admin/login', ['as'=>'admin.login','uses' => 'UsersController@admin_auth']);

Route::get('/logout', ['uses' => 'UsersController@logout']);

/* ROTAS PARA O CONTROLE DE USUÁRIOS */

Route::get('/admin/users', ['as'=>'admin.users','uses' => 'UsersController@index'], function () {})->middleware('auth');
Route::get('/admin/users/add', ['as'=>'admin.add_users','uses' => 'UsersController@adicionarUsuario'], function () {})->middleware('auth');
Route::post('/admin/users/add', ['as'=>'admin.add_users','uses' => 'UsersController@adminStore'], function () {})->middleware('auth');

/* ROTAS PARA O CONTROLE DE TUTORIAIS */

Route::get('/admin/tutorials', ['as'=>'admin.tutorials','uses' => 'TutorialsController@adminIndex'], function () {})->middleware('auth');
Route::get('/admin/tutorials/add', ['as'=>'admin.add_tutorials','uses' => 'TutorialsController@adicionarTutorial'], function () {})->middleware('auth');
Route::post('/admin/tutorials/add', ['as'=>'admin.add_tutorials','uses' => 'TutorialsController@store'], function () {})->middleware('auth');

/* ROTAS PARA O CONTROLE DE CURSOS */

Route::get('/admin/courses', ['as'=>'admin.courses','uses' => 'CoursesController@adminIndex'], function () {})->middleware('auth');
Route::get('/admin/courses/add', ['as'=>'admin.add_courses','uses' => 'CoursesController@adicionarCurso'], function () {})->middleware('auth');
Route::post('/admin/courses/add', ['as'=>'admin.add_courses','uses' => 'CoursesController@store'], function () {})->middleware('auth');

/* ROTAS PARA O CONTROLE DE CATEGORIAS */

Route::get('/admin/categories', ['as'=>'admin.categories','uses' => 'CategoriesController@adminIndex'], function () {})->middleware('auth');
Route::post('/admin/categories', ['as'=>'admin.add_categories','uses' => 'CategoriesController@store'], function () {})->middleware('auth');
