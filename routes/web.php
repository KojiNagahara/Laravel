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
//Route::get('/category', 'CategoryController@index');                    // 一覧ページ
//Route::get('/category/create', 'CategoryController@create');            // 新規作成画面
//Route::post('/category', 'CategoryController@store');                   // 保存
//Route::get('/category/{category}', 'CategoryController@show');          // 詳細ページ
//Route::get('/category/{category}/edit', 'CategoryController@edit');     // 編集ページ
//Route::patch('/category/{category}', 'CategoryController@update');      // 更新
//Route::delete('/category/{category}', 'CategoryController@destroy');    // 削除

//親子関係のあるModelを扱う場合Route::resourceは使えない
Route::get('/skill/{category}', 'SkillController@index');                 // カテゴリごとの一覧ページ
Route::get('/skill/{category}/create', 'SkillController@create');         // 新規作成画面
Route::post('/skill/{category}', 'SkillController@store');                // 保存
Route::get('/skill/{category}/{skill}/edit', 'SkillController@edit');     // 編集ページ
Route::patch('/skill/{category}/{skill}', 'SkillController@update');      // 更新
Route::delete('/skill/{category}/{skill}', 'SkillController@destroy');    // 削除

Route::get('/answer/{category}', 'AnswerController@index');                 // カテゴリごとの一覧ページ
Route::get('/answer/{category}/create', 'AnswerController@create');         // 新規作成画面
Route::post('/answer/{category}', 'AnswerController@store');                // 保存
Route::get('/answer/{category}/{answer}/edit', 'AnswerController@edit');     // 編集ページ
Route::patch('/answer/{category}/{answer}', 'AnswerController@update');      // 更新
Route::delete('/answer/{category}/{answer}', 'AnswerController@destroy');    // 削除

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
