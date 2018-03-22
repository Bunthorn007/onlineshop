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
use Illuminate\Http\Request;


Route::get('/welcome', function (){


});

Route::post('/upload', 'UserController@doImageUpload');

Route::get('/', 'UserController@index');

Route::get('/home', 'UserController@index');

Route::get('/detail/{id}', 'UserController@detail');

Route::get('/profile/{id}', 'UserController@profile');


Route::group(['middleware'=>'auth'], function (){

    //Edit Profile
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::patch('/user/update/{id}', 'UserController@update');

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
    Route::get('/admin/post/uploadimage/{id}', 'AdminPostsController@uploadImage');
    Route::post('/admin/post/doupload', 'AdminPostsController@doImageUpload');

    //Admin Category Route
    Route::get('/admin/category', 'AdminCategoriesController@readCategories');
    Route::post('addCategory', 'AdminCategoriesController@addCategory');
    Route::post('editCategory', 'AdminCategoriesController@editCategory');
    Route::post('deleteCategory', 'AdminCategoriesController@deleteCategory');

    //Admin Category Route
    Route::get('/admin/role', 'AdminRolesController@readRoles');
    Route::post('addRole', 'AdminRolesController@addRole');
    Route::post('editRole', 'AdminRolesController@editRole');
    Route::post('deleteRole', 'AdminRolesController@deleteRole');

    //Admin Post Route List
    Route::resource('user/post', 'UserPostsController');
    Route::get('/user/post/{id}/delete', 'UserPostsController@delete');
    Route::get('/user/post/uploadimage/{id}', 'UserPostsController@uploadImage');
    Route::post('/user/post/doupload', 'UserPostsController@doImageUpload');

});

Auth::routes();




