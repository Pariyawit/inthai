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

Route::get('/', 'RestaurantController@index');

Route::get('/orders', 'OrderController@index');
Route::post('/orders', 'OrderController@store');
// Route::get('/orders/{order}', 'OrderController@show');

Route::get('/order/{order}/create', 'OrderController@create');
Route::get('/order/{order}/confirm', 'OrderController@confirm');

Route::post('/customer', 'CustomerController@store');

Route::get('/items', 'ItemController@index');


Route::get('/categories', 'CategoryController@index');

Route::get('/admin', 'AdminController@main')->middleware('auth');

Route::get('/admin/orders', 'OrderController@index')->middleware('auth');
Route::get('/admin/orders/{order}', 'OrderController@show')->middleware('auth');
Route::put('/admin/orders/{order}', 'OrderController@update')->middleware('auth');

Route::get('/admin/item', 'AdminController@item')->middleware('auth');
Route::post('/admin/items', 'ItemController@store')->middleware('auth');
Route::post('/admin/items/{item}', 'ItemController@update')->middleware('auth');
Route::delete('/admin/items/{item}', 'ItemController@destroy')->middleware('auth');

Route::post('/admin/categories', 'CategoryController@store')->middleware('auth');
Route::post('/admin/categories/sort','CategoryController@updateSort')->middleware('auth');
Route::post('/admin/categories/{category}', 'CategoryController@update')->middleware('auth');
Route::delete('/admin/categories/{category}', 'CategoryController@destroy')->middleware('auth');



Route::get('/{any}', function(){
  return redirect('/');
});
