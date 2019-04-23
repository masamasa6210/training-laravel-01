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

Route::get('/items/search', 'ItemController@search')->name('items.search');
Route::resource('items', 'ItemController');
Route::resource('categories', 'CategoryController');

Route::get('/items/create', 'ItemController@create')->name('items.create');
Route::post('/items/store', 'ItemController@store')->name('items.store');


Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
Route::post('/categories/store', 'CategoryController@store')->name('categories.store');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
