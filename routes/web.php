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
    //dd(session()->all());
    return view('home');
});

Route::get('/admin/post/test', function (){

    return view('admin.post.test');
});

Route::get('/admin','AdminUsersController@dashboard');

Route::get('/admin/user/trash', 'AdminUsersController@trash');

Route::get('/admin/user/{id}/delete', 'AdminUsersController@delete');

Route::get('/admin/user/restore/{id}', 'AdminUsersController@restore');

Route::get('/admin/user/forcedelete/{id}', 'AdminUsersController@deleteTrashed');

Route::resource('admin/user', 'AdminUsersController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Post Route List
Route::resource('admin/post', 'AdminPostsController');

Route::get('/admin/post/{id}/delete', 'AdminPostsController@delete');

//Category Route
Route::resource('admin/category', 'AdminCategoriesController');

Route::get('/admin/category/{id}/delete', 'AdminCategoriesController@delete');
