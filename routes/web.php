<?php

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/{id}', 'ProductController@show')->name('products.show');

Route::post('/cart', 'CartDetailController@store')->name('cartdetail.store');
Route::delete('/cart/{id}', 'CartDetailController@destroy')->name('cartdetail.destroy');

Route::post('/order', 'CartController@update')->name('cart.update');

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function (){
	Route::get('/products', 'ProductController@index');
	Route::get('/products/create', 'ProductController@create');
	Route::post('/products', 'ProductController@store');
	Route::get('/products/{id}/edit', 'ProductController@edit')->name('products.edit');
	Route::put('/products/{id}', 'ProductController@update')->name('products.update');
	Route::delete('/products/{id}', 'ProductController@destroy')->name('products.destroy');

	Route::get('/products/{id}/images', 'ImageController@index')->name('products.images.index');
	Route::post('/products/{id}/images', 'ImageController@store')->name('products.images.store');
	Route::delete('/products/{id}/images', 'ImageController@destroy')->name('products.images.destroy');
	Route::get('/products/{id}/images/select/{image}', 'ImageController@select')->name('products.images.select');
});
