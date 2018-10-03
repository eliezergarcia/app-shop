<?php

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/search', 'SearchController@show')->name('search');
Route::get('/products/json', 'SearchController@data')->name('search.data');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products/{id}', 'ProductController@show')->name('products.show');

Route::get('/categories/{id}', 'CategoryController@show')->name('categories.show');


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

	Route::get('/categories', 'CategoryController@index')->name('categories.index');
	Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
	Route::post('/categories', 'CategoryController@store')->name('categories.store');
	Route::get('/categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');
	Route::put('/categories/{id}', 'CategoryController@update')->name('categories.update');
	Route::delete('/categories/{id}', 'CategoryController@destroy')->name('categories.destroy');
});
