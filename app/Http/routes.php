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
//主页
get('/', 'StaticPagesController@home')->name('home');
//帮助页
get('/help', 'StaticPagesController@help')->name('help');
//关于页
get('/about', 'StaticPagesController@about')->name('about');
//注册
get('signup', 'UsersController@create')->name('signup');
//用户资源路由
resource('users', 'UsersController');
//登录与登出
get('login', 'SessionsController@create')->name('login');
post('login', 'SessionsController@store')->name('login');
delete('logout', 'SessionsController@destroy')->name('logout');
//激活账户
get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
//重置密码
get('password/email', 'Auth\PasswordController@getEmail')->name('password.reset');
post('password/email', 'Auth\PasswordController@postEmail')->name('password.reset');
get('password/reset/{token}', 'Auth\PasswordController@getReset')->name('password.edit');
post('password/reset', 'Auth\PasswordController@postReset')->name('password.update');
//微博资源路由
resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);
