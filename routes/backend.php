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
    return 'index';
    return view('welcome');
});

#免验证路由
Route::group(['prefix'=>'auth'],function (){
    Route::get('login',['as'=>'auth.login.from','uses'=>'AuthController@loginFrom']);
    Route::post('login',['as'=>'auth.login','uses'=>'AuthController@login']);
    Route::get('logout',['as'=>'auth.logout','uses'=>'AuthController@logout']);
});


#网站
Route::group(['prefix'=>'web','namespace'=>'Web','middleware'=>'admin'],function (){
    Route::get('setting',['as'=>'web.setting','uses'=>'SettingController@index']);
});

#主页
Route::group([],function (){
    Route::get('/',['uses'=>'IndexController@index']);
});