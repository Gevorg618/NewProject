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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {


    Route::group(['namespace' => 'Customers', 'middleware' => 'admin' ], function () {
        Route::get('/customer', 'CustomerController@index');
        Route::get('/users-list', 'CustomerController@usersList');
    });

    Route::group(['namespace' => 'Products', 'middleware' => 'shop-manager' ], function () {
        Route::get('/product', 'ProductController@index');
        Route::get('/products-list', 'ProductController@productsList');
        Route::post('product/create', 'ProductController@create')->name('product.create');
    });

    Route::group(['namespace' => 'Orders' , 'middleware' => 'shop-manager'], function () {
        Route::get('/order', 'OrderController@index');
        Route::get('/order-list', 'OrderController@ordersList');
    });

});




