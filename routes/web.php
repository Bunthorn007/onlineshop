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

//Searching Route
Route::get('/search', 'UserController@search');
Route::get('/search/{id}', 'UserController@searchbycategory');

//Route for User or Visitor
Route::get('/', 'UserController@index');
Route::get('/home', 'UserController@index');
Route::post('/','UserController@getVueSearch');
Route::post('/loaddata','UserController@loadDataAjax' );
Route::post('/loaddatabycategory','UserController@loadListDataAjaxByCategory' );
Route::post('/loadlistdata','UserController@loadListDataAjax' );
Route::post('/loadprofiledata', 'UserController@loadProfileDataAjax');
Route::get('/detail/{id}', 'UserController@detail');
Route::get('/profile/{id}', 'UserController@profile');
Route::post('/upload', 'UserController@doImageUpload');

//Route for Shop
Route::get('/shop/{id}', 'ShopsController@index');
Route::get('/shop/product/{id}', 'ShopsController@productDetail');
Route::get('/shop/search/{id}', 'ShopsController@searchByCategory');
Route::post('/loadsearchdata','ShopsController@loadDataAjax' );
Route::get('/shop/contact/{id}', 'ShopsController@contact');
Route::post('/sendemail', 'ShopsController@sendEmail');
Route::post('/loadlistproduct','ShopsController@loadListDataAjax' );

Auth::routes();

//Route for Authenticated User
Route::group(['middleware'=>'auth'], function (){

    //Edit Profile
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::get('/user/myprofile', 'UserController@myProfile');
    Route::patch('/user/update/{id}', 'UserController@update');

    //Comment Route
    Route::post('addComment', 'CommentsController@addComment');
    Route::post('deleteComment', 'CommentsController@deleteComment');

    //Admin user Route
    Route::resource('admin/user', 'AdminUsersController');
    Route::get('/admin','AdminUsersController@dashboard');
    Route::get('/admin/usertrash', 'AdminUsersController@trash');
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

    //Admin Role Route
    Route::get('/admin/role', 'AdminRolesController@readRoles');
    Route::post('addRole', 'AdminRolesController@addRole');
    Route::post('editRole', 'AdminRolesController@editRole');
    Route::post('deleteRole', 'AdminRolesController@deleteRole');

    //Admin Shop Route
    Route::resource('admin/shop', 'AdminShopsController');
    Route::get('/admin/shop/{id}/delete', 'AdminShopsController@delete');

    //Admin Product Route
    Route::resource('admin/product', 'AdminProductsController');
    Route::get('/admin/product/{id}/delete', 'AdminProductsController@delete');
    Route::get('/categorieslist', 'AdminProductsController@categorieslist');
    Route::get('/admin/product/uploadimage/{id}', 'AdminProductsController@uploadImage');
    Route::post('/admin/product/doupload', 'AdminProductsController@doImageUpload');

    //User Post Route List
    Route::resource('user/post', 'UserPostsController');
    Route::get('/user/post/{id}/delete', 'UserPostsController@delete');
    Route::get('/user/post/uploadimage/{id}', 'UserPostsController@uploadImage');
    Route::post('/user/post/doupload', 'UserPostsController@doImageUpload');

    //User Post Route List
    Route::resource('user/shop', 'UserShopsController');

    //User Product Category Route
    Route::get('/user/shop/{id}/category', 'UserShopsController@readProCategories');
    Route::post('addProCategory', 'UserShopsController@addProCategory');
    Route::post('editProCategory', 'UserShopsController@editProCategory');
    Route::post('deleteProCategory', 'UserShopsController@deleteProCategory');

    //User Product Controller Route
    Route::resource('user/product', 'UserProductsController');
    Route::get('/user/product/{id}/delete', 'UserProductsController@delete');
    Route::get('/user/product/uploadimage/{id}', 'UserProductsController@uploadImage');
    Route::post('/user/product/doupload', 'UserProductsController@doImageUpload');


});





