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
Route::prefix('admin')->namespace('Backend')->middleware('auth')->group(function(){
	Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
	Route::prefix('products')->group(function(){
       Route::get('/', 'ProductController@index')->name('backend.product.index');
       Route::get('/create', 'ProductController@create')->name('backend.product.create');
       Route::get('/edit/{id}', 'ProductController@edit')->name('backend.product.edit');
       Route::put('/update/{id}', 'ProductController@update')->name('backend.product.update');
       Route::delete('/destroy/{id}', 'ProductController@destroy')->name('backend.product.destroy');
       Route::post('/store', 'ProductController@store')->name('backend.product.store');
       Route::get('/{id}', 'ProductController@show')->name('backend.product.show');

    });
    Route::prefix('users')->group(function(){
        Route::get('/', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');
        Route::post('/store', 'UserController@store')->name('backend.user.store');
        Route::get('/edit/{id}','UserController@edit')->name('backend.user.edit');
        Route::put('/update/{id}','UserController@update')->name('backend.user.update');
        Route::get('/{user_id}','UserController@show')->name('backend.user.show');
    });
    Route::prefix('categories')->group(function(){
    	Route::get('/','CategoryController@index')->name('backend.category.index');
        Route::get('/create','CategoryController@create')->name('backend.category.create');
        Route::post('/store','CategoryController@store')->name('backend.category.store');
        Route::get('/edit/{id}','CategoryController@edit')->name('backend.category.edit');
        Route::put('/update/{id}','CategoryController@update')->name('backend.category.update');
        Route::delete('/destroy/{id}','CategoryController@destroy')->name('backend.category.destroy');
        Route::get('/{id}','CategoryController@show')->name('backend.category.show');
    });
    Route::prefix('images')->group(function(){
      Route::delete('/destroy/{id}','ImageController@destroy')->name('backend.image.destroy');
    });
});
Route::prefix('user')->namespace('Fontend')->group(function(){
    Route::get('/index','ProductController@index')->name('fontend.index');
    Route::get('/cart','ProductController@cart')->name('fontend.product.cart');
    Route::get('/contact','ProductController@contact')->name('fontend.product.contact');
    Route::get('/product/{slug}','ProductController@product')->name('fontend.product.product');
    Route::get('/shop','ProductController@shop')->name('fontend.product.shop');
});
// Route::group([
//     'namespace' => 'Backend',
//     'prefix' => 'admin'
// ], function (){
//     Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cookie/set','CookieController@set')->name('cookie.set');
Route::get('/cookie/get','CookieController@get')->name('cookie.get');//luwu treen trinh duyet

Route::get('/home/set','SessionController@set')->name('home.set');//luu tren serve
Route::get('/home/get','SessionController@get')->name('home.get');
Route::get('/home/get2','SessionController@get2')->name('home.get2');