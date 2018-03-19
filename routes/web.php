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

use App\Post;


Route::get('/admin/post/test', function (){

    return view('admin.post.test');
});




Route::get('/', 'UserController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/detail/{id}', 'UserController@detail');


Route::group(['middleware'=>'auth'], function (){

    //Comment Route
    Route::post('addComment', 'CommentsController@addComment');
    Route::post('deleteComment', 'CommentsController@deleteComment');

    //Admin user Route
    Route::resource('admin/user', 'AdminUsersController');
    Route::get('/admin','AdminUsersController@dashboard');
    Route::get('/admin/user/trash', 'AdminUsersController@trash');
    Route::get('/admin/user/{id}/delete', 'AdminUsersController@delete');
    Route::get('/admin/user/restore/{id}', 'AdminUsersController@restore');
    Route::get('/admin/user/forcedelete/{id}', 'AdminUsersController@deleteTrashed');

    //Admin Post Route List
    Route::resource('admin/post', 'AdminPostsController');
    Route::get('/admin/post/{id}/delete', 'AdminPostsController@delete');

    //Category Route
    Route::resource('admin/category', 'AdminCategoriesController');
    Route::get('/admin/category/{id}/delete', 'AdminCategoriesController@delete');

});

Auth::routes();




