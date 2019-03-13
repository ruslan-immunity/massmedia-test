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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//post
Route::get('/post/create','PostController@create')->name('createPost');
Route::post('/post/create','PostController@store');
Route::get('/post/{id}', 'PostController@view')->name('viewPost');
Route::get('/posts', 'PostController@index');
Route::get('/edit/post/{id}','PostController@edit')->name('updatePost');
Route::post('/edit/post/{id}','PostController@update');
Route::delete('/delete/post/{id}','PostController@destroy')->name('deletePost');

//category
Route::get('/category/create','CategoryController@create')->name('createCategory');
Route::post('/category/create','CategoryController@store');
Route::get('/category/{id}', 'CategoryController@view')->name('viewCategory');
Route::get('/categories', 'CategoryController@index');
Route::get('/edit/category/{id}','CategoryController@edit')->name('updateCategory');
Route::post('/edit/category/{id}','CategoryController@update');
Route::delete('/delete/category/{id}','CategoryController@destroy')->name('deleteCategory');

//comment
Route::post('/comment','CommentController@store');



