<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
// 搭建后台主页
Route::get('/admin','AdminController@index');
Route::controller('/admin/user','UserController');
Route::controller('/admin/type','TypeController');
//Route::controller('/admin/article','ArticleController');
Route::controller('/home/center','CenterController');
Route::controller('/admin/goods','GoodsController');
Route::controller('/admin/picdetail','PicdetailController');
Route::controller('/admin/orders','OrdersController');



