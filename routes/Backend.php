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
    return 11;
    return view('welcome');
});


#网站
Route::group(['prefix'=>'web','namespace'=>'Web'],function (){
    Route::get('setting',['as'=>'web.setting','uses'=>'SettingController@index']);
});
