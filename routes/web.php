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
Route::post('/curso/', ['as'=>'courses.enter_course','uses' => 'CoursesController@enterCourse']);

/* ROTAS PARA OS TUTORIAIS */
Route::get('/tutoriais', ['as'=>'tutorials.archive','uses' => 'TutorialsController@archive']);
Route::get('/tutorial/{video}', ['as'=>'tutorials.single','uses' => 'TutorialsController@single']);

/* ROTAS PARA AS POSTAGENS */
Route::get('/blog', ['as'=>'posts.archive','uses' => 'PostsController@archive']);
Route::get('/blog/post/{post}', ['as'=>'posts.single','uses' => 'PostsController@single']);

/* ROTAS PARA OS COMENTÁRIOS */
Route::resource('/comment', 'CommentsController');


/******************************************/
/*  ROTAS GERAIS PARA PAINEL DE CONTROLE  */
/******************************************/

Route::get('/admin/', ['as'=>'dashboard.index','uses' => 'DashboardController@index']);
Route::get('/admin/login',['as' => 'admin.login_form','uses' => 'UsersController@login']);
Route::post('/admin/login', ['as'=>'admin.login','uses' => 'UsersController@auth']);
Route::get('/logout', ['uses' => 'UsersController@logout']);

/* ROTAS PARA O CONTROLE DE USUÁRIOS */
Route::get('/admin/users/trash', ['as'=>'users.trash','uses' => 'UsersController@trash']);
Route::resource('admin/users', 'UsersController');

/* ROTAS PARA O CONTROLE DE TUTORIAIS */
Route::post('/admin/tutorial/delete/{tutorial}', ['as'=>'tutorials.deletefrombd','uses' => 'TutorialsController@deleteFromBD']);
Route::post('/admin/tutorial/restore/{tutorial}', ['as'=>'tutorials.restore','uses' => 'TutorialsController@restore']);
Route::get('/admin/tutorials/trash', ['as'=>'tutorials.trash','uses' => 'TutorialsController@trash']);

Route::resource('admin/tutorials', 'TutorialsController', ['except' => ['show']]);


/* ROTAS PARA O CONTROLE DE CURSOS */
Route::get('/admin/courses/trash', ['as'=>'courses.trash','uses' => 'CoursesController@trash']);
Route::get('/admin/courses/{course}/manage', ['as'=>'courses.manage','uses' => 'CoursesController@manage', ['except' => ['show']]]);
Route::resource('admin/courses', 'CoursesController');

/* ROTAS PARA O CONTROLE DE MÓDULOS */
Route::resource('admin/course.module', 'ModulesController', ['except' => ['show']]);

/* ROTAS PARA O CONTROLE DE AULAS */
Route::resource('admin/course.module.lesson', 'LessonsController', ['except' => ['show']]);

/* ROTAS PARA O CONTROLE DE PAGINAS */
Route::post('/admin/pages/delete/{page}', ['as'=>'pages.deletefrombd','uses' => 'PagesController@deleteFromBD']);
Route::post('/admin/pages/restore/{page}', ['as'=>'pages.restore','uses' => 'PagesController@restore']);
Route::get('/admin/pages/trash', ['as'=>'pages.trash','uses' => 'PagesController@trash']);
Route::get('/{page}', ['as'=>'pages.single','uses' => 'PagesController@single']);
Route::resource('admin/pages', 'PagesController', ['except' => ['show']]);

/* ROTAS PARA O CONTROLE DE POSTAGENS */
Route::post('/admin/posts/delete/{post}', ['as'=>'posts.deletefrombd','uses' => 'PostsController@deleteFromBD']);
Route::post('/admin/posts/restore/{post}', ['as'=>'posts.restore','uses' => 'PostsController@restore']);
Route::get('/admin/posts/trash', ['as'=>'posts.trash','uses' => 'PostsController@trash']);
Route::resource('admin/posts', 'PostsController', ['except' => ['show']]);

/* ROTAS PARA O CONTROLE DE CATEGORIAS */
Route::resource('admin/categories', 'CategoriesController', ['except' => ['show']]);

/* ROTAS PARA O CONTROLE DE CONFIGURAÇÕES */
Route::get('/admin/settings', ['as'=>'admin.settings','uses' => 'SettingsController@index']);

/* ROTAS PARA O CONTROLE DE MÍDIA */
Route::get('/admin/library', ['as'=>'admin.library','uses' => 'DashboardController@library']);

/* ROTAS PARA CATEGORIAS */
Route::get('/categoria/{categoria}', ['as'=>'user.category','uses' => 'Controller@category']);



