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
  Route::get('/error/{id}', 'DashboardController@error')->name('backend.error');
	Route::prefix('products')->group(function(){
       Route::get('/', 'ProductController@index')->name('backend.product.index');
       Route::get('/show', 'ProductController@show')->name('backend.product.show');
       Route::get('/create', 'ProductController@create')->name('backend.product.create');
       Route::post('/store', 'ProductController@store')->name('backend.product.store');
       Route::get('/edit/{id}', 'ProductController@edit')->name('backend.product.edit');
       Route::get('/images/{id}', 'ProductController@images')->name('backend.product.images');
       Route::put('/update/{id}', 'ProductController@update')->name('backend.product.update');
       Route::delete('/destroy/{id}', 'ProductController@destroy')->name('backend.product.destroy');
       Route::get('/{id}', 'ProductController@show')->name('backend.product.show');

    });
    Route::prefix('users')->group(function(){
        Route::get('/', 'UserController@index')->name('backend.user.index');
        Route::get('/create', 'UserController@create')->name('backend.user.create');
        Route::post('/store', 'UserController@store')->name('backend.user.store');
        Route::get('/show', 'UserController@show')->name('backend.user.show');
        Route::get('/resetpassword', 'UserController@resetpassword')->name('backend.user.reset');
        Route::put('/updatepassword/{id}', 'UserController@updatepassword')->name('backend.user.updatepass');
        Route::get('/edit/{id}','UserController@edit')->name('backend.user.edit');
        Route::get('/editinfo/{id}','UserController@editinfo')->name('backend.user.editinfo');
        Route::put('/update/{id}','UserController@update')->name('backend.user.update');
        Route::put('/updateinfo/{id}','UserController@updateinfo')->name('backend.user.updateinfo');
        Route::put('/updateimage/{id}','UserController@updateimage')->name('backend.user.updateimage');
        Route::delete('/destroy/{id}', 'UserController@destroy')->name('backend.user.destroy');
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
      Route::delete('/destroy/{id}/{product_id}','ImageController@destroy')->name('backend.image.destroy');
    });
    Route::prefix('bill')->group(function(){
      Route::get('','BillController@index')->name('backend.bill.index');
      Route::get('/detailbill/{id}','BillController@detailbill')->name('backend.bill.detailbill');
      Route::get('/editbill/{id}','BillController@edit')->name('backend.bill.editbill');
      Route::put('/updatebill/{id}','BillController@update')->name('backend.bill.updatebill');
      Route::get('/billupdate/{id}','BillController@billupdate')->name('backend.bill.billupdate');
      Route::delete('/destroy/{id}','BillController@destroy')->name('backend.bill.destroy');
    });
});
Route::prefix('user')->namespace('Fontend')->group(function(){
    Route::get('/','ProductController@index')->name('fontend.index');
    Route::get('/getcache', 'ProductController@getcache')->name('getcache');
    Route::get('/indexcart','CartController@index')->name('fontend.indexcart');
    Route::get('/updatecart/{id}','CartController@update')->name('fontend.updatecart');
    Route::get('/order','OrderController@index')->name('fontend.order');
    Route::post('/orderstore','OrderController@orderstore')->name('fontend.orderstore');
    Route::get('/cartadd/{id}','CartController@add')->name('fontend.cartadd');
    Route::delete('/deletecart','CartController@delete')->name('fontend.deletecart');
    Route::get('/contact','ProductController@contact')->name('fontend.product.contact');
    Route::get('/product/{slug}','ProductController@product')->name('fontend.product.product');
    Route::get('/shop/{slug}','ProductController@shop')->name('fontend.product.shop');
});

// Route::group([
//     'namespace' => 'Backend',
//     'prefix' => 'admin'
// ], function (){
//     Route::get('/dashboard', 'DashboardController@index')->name('backend.dashboard');
// });

Auth::routes();
Route::get('/dashboard_full', 'HomeController@index')->name('dashboard_full');

Route::get('/cookie/set','CookieController@set')->name('cookie.set');
Route::get('/cookie/get','CookieController@get')->name('cookie.get');//luwu treen trinh duyet

Route::get('/home/set','SessionController@set')->name('home.set');//luu tren serve
Route::get('/home/get','SessionController@get')->name('home.get');
Route::get('/home/get2','SessionController@get2')->name('home.get2');

// Route::get('/index', 'HomeController@getcache')->name('home.index');