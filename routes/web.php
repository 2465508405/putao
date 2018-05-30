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
Route::get('consult','Consult\ConsultController@index');
Route::get('instruction','Instruction\InstructionController@index');
Route::get('notice','Notice\NoticeController@index');
Route::get('payment','Payment\PaymentController@index');
//Route::group(['middleware'=>['auth','checkUserPermission']],function(){
//    Route::get('/', 'Article\ArticleController@index');
//    Route::get('article/list', 'Article\ArticleController@index');
//    Route::get('article/add', 'Article\ArticleController@add');
//    Route::post('article/postCreate', 'Article\ArticleController@postCreate');
//    Route::get('article/edit', 'Article\ArticleController@edit');
//    Route::post('article/postEdit', 'Article\ArticleController@postEdit');
//    Route::post('article/upload', 'Article\ArticleController@upload');
//    Route::get('position/list', 'Article\ClassifyController@index');
//    Route::get('position/add', 'Article\ClassifyController@add');
//    Route::post('position/postCreate', 'Article\ClassifyController@postCreate');
//    Route::post('position/postEdit', 'Article\ClassifyController@postEdit');
//    Route::get('position/edit', 'Article\ClassifyController@edit');
//    Route::post('position/del', 'Article\ClassifyController@del');
//    Route::get('user/list', 'User\UserController@index');
//    Route::get('user/add', 'User\UserController@add');
//    Route::get('user/edit', 'User\UserController@edit');
//    Route::post('user/postEdit', 'User\UserController@postEdit');
//    Route::post('user/postCreate', 'User\UserController@postCreate');
//    Route::get('permission/index', 'User\PermissionController@index');
//    Route::get('permission/add', 'User\PermissionController@add');
//    Route::post('permission/postCreate', 'User\PermissionController@postCreate');
//    Route::post('permission/postEdit', 'User\PermissionController@postEdit');
//    Route::get('permission/edit', 'User\PermissionController@edit');
//    Route::get('perm/classify/index','User\PermissionClassifyController@index');
//    Route::get('perm/classify/add','User\PermissionClassifyController@add');
//    Route::post('perm/classify/postCreate','User\PermissionClassifyController@postCreate');
//    Route::get('perm/classify/edit','User\PermissionClassifyController@edit');
//    Route::post('perm/classify/postEdit','User\PermissionClassifyController@postEdit');
//    Route::get('group/index','User\GroupController@index');
//    Route::get('group/add','User\GroupController@add');
//    Route::post('group/postCreate','User\GroupController@postCreate');
//    Route::get('group/edit','User\GroupController@edit');
//    Route::post('group/postEdit','User\GroupController@postEdit');
//    Route::get('left/column/index','User\ActionColumnController@index');
//    Route::get('left/column/add','User\ActionColumnController@add');
//    Route::get('left/column/edit','User\ActionColumnController@edit');
//    Route::post('left/column/postCreate','User\ActionColumnController@postCreate');
//    Route::post('left/column/postEdit','User\ActionColumnController@postEdit');
//
//    /*
//     * 链接管理
//     */
//    Route::get('link/list','Link\LinkController@index');
//    Route::get('link/create','Link\LinkController@create');
//    Route::post('link/postCreate','Link\LinkController@postCreate');
//    Route::get('link/edit','Link\LinkController@edit');
//    Route::post('link/postEdit','Link\LinkController@postEdit');
//    Route::post('link/del','Link\LinkController@delete');
//
//    /*
//     * 广告位管理
//     */
//    Route::get('ad/list','Ad\AdController@index');
//    Route::get('ad/create','Ad\AdController@create');
//    Route::post('ad/postCreate','Link\LinkController@postCreate');
//    Route::get('ad/edit','Ad\AdController@edit');
//    Route::post('ad/postEdit','Link\LinkController@postEdit');
//    Route::post('link/del','Ad\AdController@delete');
//});
//Route::post('auth/login','Auth\LoginController@postLogin');
//Route::get('logout','Auth\LoginController@logout');
//Auth::routes();
