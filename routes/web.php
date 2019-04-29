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
Route::get('/','Home\HomeController@index');
Route::get('index{id}.html','Home\HomeController@lists');
Route::get('thread-{id}.html','Home\HomeController@detail');
Route::get('g-{id}.html','Home\HomeController@goodsDetail');
Route::get('consult','Consult\ConsultController@index');
Route::get('instruction','Instruction\InstructionController@index');
Route::get('notice','Notice\NoticeController@index');
Route::get('payment','Payment\PaymentController@index');
Route::get('about','About\AboutController@index');

