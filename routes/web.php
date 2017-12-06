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
    Route::get('/', 'Article\ArticleController@index');
    Route::get('/article/list', 'Article\ArticleController@index');
    Route::get('article/add', 'Article\ArticleController@add');
    Route::post('article/postCreate', 'Article\ArticleController@postCreate');
    Route::get('position/list', 'Article\ClassifyController@index');
    Route::get('position/add', 'Article\ClassifyController@add');
    Route::post('position/postCreate', 'Article\ClassifyController@postCreate');
    Route::get('user/list', 'User\UserController@index');
    Route::get('user/add', 'User\UserController@add');
    Route::post('user/postCreate', 'User\UserController@postCreate');
//});
//Route::post('auth/login','Auth\LoginController@postLogin');
//Auth::routes();

