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

Route::get('/','ProductsController@index');

Route::get('/edit','ProductsController@edit');
Route::get('/create','ProductsController@create');
Route::get('/products/create','ProductsController@create');

Route::resource('products','ProductsController');


Auth::routes();

// Route::get('/dashboard', 'DashboardController@index');
