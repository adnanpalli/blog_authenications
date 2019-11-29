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





Route::resource('post','PostController');
Route::get('contact','PagesController@getContact');
Route::get('about','PagesController@getAbout');
Route::get('blog/{slug}',['as'=>'blog.view','uses'=>'BlogController@getsingle']);
Route::get('blog',['as'=>'blog.index','uses'=>'BlogController@getindex']);
Route::get('/','PagesController@getIndex');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
