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

Route::resource('category','CategoryController');
Route::resource('post','PostController');
Route::resource('tag','TagController');
Route::post('contact','PagesController@sendEmail');
Route::get('contact','PagesController@getContact');
Route::get('about','PagesController@getAbout');
Route::get('blog/{slug}',['as'=>'blog.view','uses'=>'BlogController@getsingle']);
Route::get('blog',['as'=>'blog.index','uses'=>'BlogController@getindex']);

Route::get('catblog/{id}',['as'=>'blog.shows','uses'=>'PagesController@getblogbycatgory']);
Route::post('c/{post_id}',['as'=>'comment.save','uses'=>'CommentController@store']);
Route::get('/','PagesController@getIndex');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

route::get('publish/{post_id}',['as'=>'post.publish','uses'=>'SuperadminController@publish']);
route::get('unpublish/{post_id}',['as'=>'post.unpublish','uses'=>'SuperadminController@unpublish']);

Route::get('/superadmin', 'SuperadminController@index')->name('superadmin');
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/user', 'UserController@index')->name('user');



