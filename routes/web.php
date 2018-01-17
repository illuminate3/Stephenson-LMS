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
Route::get('/curso/{curso}', ['as'=>'courses.single','uses' => 'CoursesController@single']);

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
Route::get('/admin/user/edit/{user}', ['as'=>'admin.edit_user','uses' => 'UsersController@adminEditarUsuario'], function () {})->middleware('auth');
Route::post('/admin/user/edit/{user}', ['as'=>'admin.edit_user','uses' => 'UsersController@adminUpdate'], function () {})->middleware('auth');
Route::delete('/admin/user/delete/{user}', ['as'=>'admin.delete_user','uses' => 'UsersController@destroy'], function () {})->middleware('auth');

/* ROTAS PARA O CONTROLE DE TUTORIAIS */

Route::get('/admin/tutorials', ['as'=>'admin.tutorials','uses' => 'TutorialsController@adminIndex'], function () {})->middleware('auth');
Route::get('/admin/tutorials/add', ['as'=>'admin.add_tutorials','uses' => 'TutorialsController@adicionarTutorial'], function () {})->middleware('auth');
Route::post('/admin/tutorials/add', ['as'=>'admin.add_tutorials','uses' => 'TutorialsController@store'], function () {})->middleware('auth');
Route::get('/admin/tutorial/edit/{tutorial}', ['as'=>'admin.edit_tutorial','uses' => 'TutorialsController@editarTutorial'], function () {})->middleware('auth');
Route::post('/admin/tutorial/edit/{tutorial}', ['as'=>'admin.edit_tutorial','uses' => 'TutorialsController@update'], function () {})->middleware('auth');
Route::delete('/admin/tutorial/delete/{tutorial}', ['as'=>'admin.delete_tutorial','uses' => 'TutorialsController@destroy'], function () {})->middleware('auth');

/* ROTAS PARA O CONTROLE DE CURSOS */

Route::get('/admin/courses', ['as'=>'admin.courses','uses' => 'CoursesController@adminIndex'], function () {})->middleware('auth');
Route::get('/admin/courses/add', ['as'=>'admin.add_courses','uses' => 'CoursesController@adicionarCurso'], function () {})->middleware('auth');
Route::post('/admin/courses/add', ['as'=>'admin.add_courses','uses' => 'CoursesController@store'], function () {})->middleware('auth');
Route::get('/admin/course/edit/{course}', ['as'=>'admin.edit_courses','uses' => 'CoursesController@editarCurso'], function () {})->middleware('auth');
Route::post('/admin/course/edit/{course}', ['as'=>'admin.edit_courses','uses' => 'CoursesController@update'], function () {})->middleware('auth');
Route::delete('/admin/course/delete/{course}', ['as'=>'admin.delete_course','uses' => 'CoursesController@destroy'], function () {})->middleware('auth');
Route::get('/admin/course/manage/{course}', ['as'=>'admin.manage_course','uses' => 'CoursesController@gerenciarCurso'], function () {})->middleware('auth');
Route::post('/admin/course/manage/{course}/module/add', ['as'=>'admin.add_module','uses' => 'ModulesController@store'], function () {})->middleware('auth');

/* ROTAS PARA O CONTROLE DE POSTAGENS */

Route::get('/admin/posts', ['as'=>'admin.posts','uses' => 'PostsController@adminIndex'], function () {})->middleware('auth');
Route::get('/admin/posts/add', ['as'=>'admin.add_posts','uses' => 'PostsController@adicionarPostagem'], function () {})->middleware('auth');
Route::post('/admin/posts/add', ['as'=>'admin.add_posts','uses' => 'PostsController@store'], function () {})->middleware('auth');
Route::get('/admin/post/edit/{post}', ['as'=>'admin.edit_post','uses' => 'PostsController@editarPostagem'], function () {})->middleware('auth');
Route::post('/admin/post/edit/{post}', ['as'=>'admin.edit_post','uses' => 'PostsController@update'], function () {})->middleware('auth');

/* ROTAS PARA O CONTROLE DE CATEGORIAS */

Route::get('/admin/categories', ['as'=>'admin.categories','uses' => 'CategoriesController@adminIndex'], function () {})->middleware('auth');
Route::post('/admin/categories', ['as'=>'admin.add_categories','uses' => 'CategoriesController@store'], function () {})->middleware('auth');
Route::get('/admin/category/edit/{category}', ['as'=>'admin.edit_category','uses' => 'CategoriesController@editarCategoria'], function () {})->middleware('auth');
Route::post('/admin/category/edit/{category}', ['as'=>'admin.edit_category','uses' => 'CategoriesController@update'], function () {})->middleware('auth');

/* ROTAS PARA O CONTROLE DE CONFIGURAÇÕES */
Route::get('/admin/settings', ['as'=>'admin.settings','uses' => 'DashboardController@settings'], function () {})->middleware('auth');

/* ROTAS PARA O CONTROLE DE MÍDIA */
Route::get('/admin/library', ['as'=>'admin.library','uses' => 'DashboardController@library'], function () {})->middleware('auth');

	
	 Route::get('/laravel-filemanager/library', [
        'uses' => 'LfmController@library',
        'as' => 'library',
    ]);