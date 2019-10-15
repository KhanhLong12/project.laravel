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
       Route::get('/{id}', 'ProductController@show')->name('backend.product.show');

    });
    Route::prefix('users')->group(function(){
        Route::get('/', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');
        Route::get('/{user_id}','UserController@show')->name('backend.user.show');
    });
    Route::prefix('categories')->group(function(){
    	Route::get('/','CategoryController@index')->name('backend.category.index');
        Route::get('/create','CategoryController@create')->name('backend.category.create');
        Route::get('/{id}','CategoryController@show')->name('backend.category.show');
    });
});
Route::prefix('user')->namespace('Fontend')->group(function(){
    Route::get('/index','ProductController@index')->name('fontend.index');
    Route::get('/cart','ProductController@cart')->name('fontend.product.cart');
    Route::get('/contact','ProductController@contact')->name('fontend.product.contact');
    Route::get('/product','ProductController@product')->name('fontend.product.product');
    Route::get('/shop','ProductController@shop')->name('fontend.product.shop');
});
// Route::group([
//     'namespace' => 'Backend',
//     'prefix' => 'admin'
// ], function (){
//     Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
// });