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
Route::get('/products/price/update', function () {
    return response()->json(['response' => 'This is get method']);
});


Route::get('/weather', 'WeatherController@index')->name('weather');
Route::get('/orders', 'OrderController@index')->name('orders');
Route::get('/orders/{id}/edit', 'OrderController@edit')->name('orders.edit');
Route::post('/orders/{id}/edit', 'OrderController@update')->name('orders.update');


Route::post('/products/price/update', 'ProductController@ajaxPriceUpdate')->name('product.price.update');
Route::get('/products', 'ProductController@index')->name('products');
//Route::get('/products/price/update', 'ProductController@ajaxPriceUpdate')->name('product.price.update2');

