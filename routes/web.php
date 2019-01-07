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

Route::get('/', 'PagesController@home');

Route::get('/about', 'PagesController@about')->name('about');

Route::resource('category', 'CategoryController');
//この一文で以下のコード群と同じ定義を実施する。
//Route::get('/category', 'CategoryController@index');
//Route::get('/category/create', 'CategoryController@create');
//Route::post('/category', 'CategoryController@store');
//Route::get('/category/{category}', 'CategoryController@show');
//Route::get('/category/{category}/edit', 'CategoryController@edit');
//Route::patch('/category/{category}', 'CategoryController@update');
//Route::delete('/category/{category}', 'CategoryController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
