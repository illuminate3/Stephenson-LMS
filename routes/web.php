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

Route::get('/register', ['as'=>'register','uses' => 'Controller@register']);
Route::post('/register', ['as'=>'register','uses' => 'Controller@store']);
Route::get('/login',['as' => 'login','uses' => 'Controller@login']);
Route::post('/login', ['as'=>'login','uses' => 'Controller@auth']);
Route::get('/logout', ['as'=>'logout', 'uses' => 'Controller@logout']);

Route::get('/chat', ['as' => 'chat', 'uses' => 'MessagesController@index']);

/* ROTAS PARA O PERFIL */

Route::get('/profile/{profile}', ['as' => 'profile.profile', 'uses' => 'ProfilesController@perfil']);
Route::get('/profile/{profile}/about', ['as' => 'profile.about', 'uses' => 'ProfilesController@perfil_about']);
Route::get('/profile/{profile}/followers', ['as' => 'profile.followers', 'uses' => 'ProfilesController@perfil_followers']);
Route::get('/profile/{profile}/following', ['as' => 'profile.following', 'uses' => 'ProfilesController@perfil_following']);

/* ROTAS PARA OS CURSOS */
Route::get('/courses', ['as'=>'courses.all','uses' => 'CoursesController@all']);
Route::get('/course/{course}', ['as'=>'courses.single','uses' => 'CoursesController@single']);
Route::get('/course/{course}/{page}', ['as'=>'courses.single_content','uses' => 'CoursesController@singlePage']);
Route::get('/my-courses', ['as'=>'courses.user_courses','uses' => 'Controller@userCourses']);
Route::get('/my-courses/favorites', ['as'=>'courses.user_favorite_courses','uses' => 'Controller@userFavoriteCourses']);
Route::post('/course/enter', ['as'=>'courses.enter_course','uses' => 'CoursesController@enterOrFavoriteCourse']);
Route::post('/course/favorite', ['as'=>'courses.favorite_course','uses' => 'CoursesController@enterOrFavoriteCourse']);
Route::post('/course/leave', ['as'=>'courses.leave_course','uses' => 'CoursesController@leaveCourse']);


Route::get('/curso/{curso}/learn/{lesson}', ['as'=>'lesson.view_lesson','uses' => 'LessonsController@single']);

/* ROTAS PARA OS TUTORIAIS */
Route::get('/tutorials', ['as'=>'tutorials.all','uses' => 'TutorialsController@all']);
Route::get('/tutorial/{tutorial}', ['as'=>'tutorials.single','uses' => 'TutorialsController@single']);

/* ROTAS PARA AS POSTAGENS */
Route::get('/posts', ['as'=>'posts.all','uses' => 'PostsController@all']);
Route::get('/posts/{post}', ['as'=>'posts.single','uses' => 'PostsController@single']);

/* ROTAS PARA OS COMENTÁRIOS */
Route::resource('/comment', 'CommentsController');


/******************************************/
/*  ROTAS GERAIS PARA PAINEL DE CONTROLE  */
/******************************************/

Route::get('/admin/', ['as'=>'dashboard.index','uses' => 'DashboardController@index']);

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
Route::get('/admin/courses/{course}/statistics', ['as'=>'courses.statistics','uses' => 'CoursesController@manage', ['except' => ['show']]]);
Route::resource('admin/courses', 'CoursesController');

/* ROTAS PARA O CONTROLE DE MÓDULOS */
Route::post('/admin/course/module/reorder', ['as'=>'module.reorder','uses' => 'ModulesController@reorder']);
Route::resource('admin/course.module', 'ModulesController', ['except' => ['show']]);

/* ROTAS PARA O CONTROLE DE AULAS */
Route::post('/admin/course/module/lesson/reorder', ['as'=>'lesson.reorder','uses' => 'LessonsController@reorder']);
Route::get('/admin/lesson/{lesson}/form/{form}', ['as'=>'lesson.load_form','uses' => 'LessonsController@load_form']);
Route::post('/admin/lesson/{lesson}/material/create/{material}', ['as'=>'lesson.create_material','uses' => 'LessonsController@createMaterial']);
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



