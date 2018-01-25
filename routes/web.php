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

/******************************************/
/*  ROTAS GERAIS PARA VISITANTES  */
/******************************************/

Route::get('/', ['as' => 'home','uses' => 'Controller@homepage']);

Route::get('/cadastro', ['as'=>'signup','uses' => 'UsersController@userCreate']);
Route::post('/cadastro', ['as'=>'signup','uses' => 'UsersController@userStore']);

Route::get('/login',['as' => 'login_form','uses' => 'UsersController@userLogin']);
Route::post('/login', ['as'=>'login','uses' => 'UsersController@userAuth']);

Route::get('/chat', ['uses' => 'Controller@chat']);

/* ROTAS PARA O PERFIL */

Route::get('/perfil/{profile}', ['as' => 'profile.profile', 'uses' => 'Controller@perfil']);
Route::get('/perfil/{profile}/about', ['as' => 'profile.about', 'uses' => 'Controller@perfil_about']);
Route::get('/perfil/{profile}/followers', ['as' => 'profile.followers', 'uses' => 'Controller@perfil_followers']);
Route::get('/perfil/{profile}/following', ['as' => 'profile.following', 'uses' => 'Controller@perfil_following']);
Route::get('/perfil/{profile}/settings', ['as' => 'profile.settings', 'uses' => 'Controller@perfil_settings']);

/* ROTAS PARA OS CURSOS */
Route::get('/cursos', ['as'=>'courses.archive','uses' => 'CoursesController@archive']);
Route::get('/curso/{curso}', ['as'=>'courses.single','uses' => 'CoursesController@single']);

/* ROTAS PARA OS TUTORIAIS */
Route::get('/tutoriais', ['as'=>'tutorials.archive','uses' => 'TutorialsController@archive']);
Route::get('/tutorial/{video}', ['as'=>'tutorials.single','uses' => 'TutorialsController@single']);

/* ROTAS PARA OS COMENTÁRIOS */
Route::post('/comment', ['as'=>'comment','uses' => 'CommentsController@store'], function () {})->middleware('auth');


/******************************************/
/*  ROTAS GERAIS PARA PAINEL DE CONTROLE  */
/******************************************/

Route::get('/admin/', ['as'=>'dashboard.index','uses' => 'DashboardController@index']);
Route::get('/admin/login',['as' => 'admin.login_form','uses' => 'UsersController@login']);
Route::post('/admin/login', ['as'=>'admin.login','uses' => 'UsersController@auth']);
Route::get('/logout', ['uses' => 'UsersController@logout']);

/* ROTAS PARA O CONTROLE DE USUÁRIOS */
Route::resource('admin/users', 'UsersController');

/* ROTAS PARA O CONTROLE DE TUTORIAIS */
Route::resource('admin/tutorials', 'TutorialsController');

/* ROTAS PARA O CONTROLE DE CURSOS */
Route::resource('admin/courses', 'CoursesController');
Route::get('/admin/courses/{course}/manage', ['as'=>'courses.manage','uses' => 'CoursesController@manage']);

/* ROTAS PARA O CONTROLE DE MÓDULOS */
Route::resource('admin/course.module', 'ModulesController');

/* ROTAS PARA O CONTROLE DE AULAS */
Route::resource('admin/course.module.lesson', 'LessonsController');

/* ROTAS PARA O CONTROLE DE PAGINAS */
Route::resource('admin/pages', 'PagesController');
Route::get('/{page}', ['as'=>'pages.single','uses' => 'PagesController@single']);

/* ROTAS PARA O CONTROLE DE POSTAGENS */
Route::resource('admin/posts', 'PostsController');

/* ROTAS PARA O CONTROLE DE CATEGORIAS */
Route::resource('admin/categories', 'CategoriesController');

/* ROTAS PARA O CONTROLE DE CONFIGURAÇÕES */
Route::get('/admin/settings', ['as'=>'admin.settings','uses' => 'DashboardController@settings'], function () {})->middleware('auth');

/* ROTAS PARA O CONTROLE DE MÍDIA */
Route::get('/admin/library', ['as'=>'admin.library','uses' => 'DashboardController@library'], function () {})->middleware('auth');



