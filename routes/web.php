<?php

use Illuminate\Support\Facades\Route;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'HomeController@index')->name('home'); //Ruta principal


Route::get('/postPage/{postId}', 'HomeController@post')->name('post'); //Ruta de los post


Route::get('/post/{category}', 'HomeController@postByCategory')->name('post.category'); //Ruta de categorias


Route::get('/home', function(){ //Ruta para el index admin
	return view('home');
})->name('home')->middleware('auth');


//Ruta del formulario crear comentario
Route::post('/', 'HomeController@store')->name('comentario.posts.store'); 




//Ruta de la pagina de las categorias
Route::get('/admin/categories', 'Admin\CategoriesController@index')->name('admin.categories.index');
//Ruta del formulario crear categforias
Route::post('/admin/categories/store', 'Admin\CategoriesController@store')->name('admin.categories.store'); 
//Ruta del formulario editar categforias
Route::post('/admin/categories/{categoryId}/update', 'Admin\CategoriesController@update')->name('admin.categories.update'); 
//Ruta del formulario eliminar categforias
Route::delete('/admin/categories/{categoryId}/delete', 'Admin\CategoriesController@delete')->name('admin.categories.delete'); 




//Ruta de la pagina de post
Route::get('/admin/posts', 'Admin\PostsController@index')->name('admin.posts.index');

//Ruta de la pagina de crear nuevo post
Route::get('/admin/newPost', 'Admin\PostsController@newPost')->name('admin.newPosts');

//Ruta de la pagina de editar  post
Route::post('/admin/posts/{postId}/editarPost', 'Admin\PostsController@editarPost')->name('admin.editarPosts');

//Ruta del formulario crear post
Route::post('/admin/posts/store', 'Admin\PostsController@store')->name('admin.posts.store'); 
//Ruta del formulario editar post
Route::post('/admin/posts/{postId}/update', 'Admin\PostsController@update')->name('admin.posts.update'); 
//Ruta del formulario eliminar post
Route::delete('/admin/posts/{postId}/delete', 'Admin\PostsController@delete')->name('admin.posts.delete'); 

//Ruta de gestionar comentarios
Route::get('/admin/comments', 'Admin\PostsController@comments')->name('admin.comments');

//Ruta del formulario eliminar comentario
Route::delete('/admin/comments/{commentId}/delete', 'Admin\PostsController@commentDelete')->name('admin.comment.delete'); 

//Ruta del formulario aprobar comentario
Route::post('/admin/comments/{commentId}/aprobar', 'Admin\PostsController@commentAprobar')->name('admin.comment.aprobar'); 

//Ruta del formulario no aprobar comentario
Route::post('/admin/comments/{commentId}/noAprobar', 'Admin\PostsController@commentnoAprobar')->name('admin.comment.noAprobar'); 

Auth::routes();

