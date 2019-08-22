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

Route::get('/','ShoppingCartController@products')->name('products');
Route::get('/cart','ShoppingCartController@cart')->name('cart');
Route::get('/add-to-cart/{id}', 'ShoppingCartController@addToCart')->name('add-to-cart');
Route::get('/remove-from-cart/{id}', 'ShoppingCartController@removeFromCart')->name('remove-from-cart');
Route::get('/checkout','ShoppingCartController@checkout')->name('checkout');

Route::post('/update-quantities', 'ShoppingCartController@updateQuantities')->name('update-quantities');
