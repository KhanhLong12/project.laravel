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
Route::prefix('admin')->namespace('Backend')->group(function(){
	Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
	Route::prefix('products')->group(function(){
       Route::get('/', 'ProductController@index')->name('backend.product.index');
       Route::get('/create', 'ProductController@create')->name('backend.product.create');
    });
    Route::prefix('users')->group(function(){
        Route::get('/', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');
    });
    Route::prefix('categories')->group(function(){
    	Route::get('/','CategoryController@index')->name('backend.category.index');
    	Route::get('/create','CategoryController@create')->name('backend.category.create');
    });
});
// Route::group([
//     'namespace' => 'Backend',
//     'prefix' => 'admin'
// ], function (){
//     Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
// });