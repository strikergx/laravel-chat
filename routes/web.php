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

Route::any('/wechat', 'WechatController@serve');

Route::any('/he', 'HeController@test');

Route::any('/user/profile','StartController@start');

Route::any('/oauth_callback','StartController@callback');

Route::any('/user/profile','StartController@start')->middleware('wechat.oauth');

Route::any('/server','ServerController@server');

Route::any('/send','MesController@send');