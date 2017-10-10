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
//Route::group(['middleware'=>['auth']],function(){
    Route::get('/', 'HomeController@index');
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('article/list', 'Article\ArticleController@index');
    Route::get('article/add', 'Article\ArticleController@add');
    Route::post('article/postCreate', 'Article\ArticleController@postCreate');
    Route::post('article/upload', 'Article\ArticleController@upload');
//});
//Route::post('auth/login','Auth\LoginController@postLogin');
//Auth::routes();


