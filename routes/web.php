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

Route::get('/','Home\PersonalController@login');

//用户登录路由
Route::get('/login','Home\PersonalController@login');

//用户注册页面路由
Route::get('/register','Home\PersonalController@register');

//处理用户注册路由
Route::post('/doReg','Home\PersonalController@doReg');

//处理用户登录路由
Route::get('/doLogin','Home\PersonalController@doLogin');

//博客
Route::group(['prefix'=>'blog','middleware' => 'web'], function () {

    Route::get('/','Home\BlogController@home');
    Route::get('/index','Home\BlogController@index');
    Route::get('/lists','Home\BlogController@lists');
    Route::get('/edit/{id}','Home\BlogController@edit');
    Route::get('/del/{id}','Home\BlogController@del');
    Route::post('/doEdit/{id}','Home\BlogController@doEdit');
    Route::post('/deliver','Home\BlogController@deliver');

});
