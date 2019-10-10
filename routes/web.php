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


Auth::routes();

Route::get('/', 'HomeController@index');
route::get('/logout' , 'HomeController@logout');
Route::get('/about' , 'HomeController@about');




Route::get('/post/{id}' , 'PostController@post');
Route::post('/storepost' , 'PostController@storepost');
Route::get('/editpost' , 'PostController@editpost');
Route::get('/deletepost/{id}' , 'PostController@deletepost');




Route::post('/commentstore/{id}' , 'CommentController@commentstore');





Route::get('/profile/{id}' , 'ProfileController@profile');
Route::get('/editprofile' ,  'ProfileController@editprofile');
Route::post('/editprofilestore' , 'ProfileController@editprofilestore');
Route::get('/createpost' , 'ProfileController@createpost');

