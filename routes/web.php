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

//文章
Route::group(['prefix' => 'article'], function () {
    Route::get('/', "home\ArticleController@index");  //列表页
    Route::get('/detail/{article}', "home\ArticleController@detail");  //详情页
    Route::get('/create', "home\ArticleController@create");  //创建页
    Route::post('/create', "home\ArticleController@doCreate");  //创建操作
    Route::get('/edit/{article}', "home\ArticleController@edit");  //编辑页
    Route::post('/doedit', "home\ArticleController@doEdit");  //编辑操作
    Route::get('/delete/{id}', "home\ArticleController@delete");  //编辑操作
    Route::post('/docomment', "home\ArticleController@comment");  //评论添加
});

//用户
Route::group(['prefix' => 'user'], function () {
    Route::get('/register', "home\UserController@register");  //注册也
    Route::post('/doregister', "home\UserController@doRegister");  //注册操作
    Route::get('/setting/{user}', "home\UserController@setting");  //设置页
    Route::post('/dosetting', "home\UserController@doSetting");  //设置操作
});

//登录，退出
Route::get('/login', "home\LoginController@login"); //登录页面
Route::post('/dologin', "home\LoginController@doLogin"); //登录操作
Route::get('/logout', "home\LoginController@doLogout"); //退出操作


