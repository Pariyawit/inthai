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



Auth::routes();

Route::get('/', 'RestaurantsController@index');

Route::get('/orders', 'OrdersController@index');
Route::post('/orders', 'OrdersController@store');
Route::get('/orders/{order}', 'OrdersController@show');

Route::get('/order/{order}/create', 'OrdersController@create');
Route::get('/order/{order}/confirm', 'OrdersController@confirm');

Route::post('/customer', 'CustomersController@store');

