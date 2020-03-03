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
Route::get('/orders/{id}', 'OrdersController@show');

Route::get('/order/{id}/create', 'OrdersController@create');

