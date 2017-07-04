<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|{{ url('')}}
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 前台登录限制控制组
Route::group(['middleware'=>'userlogin'],function(){

	//前台主页
	Route::get('/user/index','User\IndexController@index')->middleware('userlogin');

	
});
// 验证码
Route::get('/kit/captcha/{tmp}','User\KitController@captcha');
//前台登录页
Route::get('/user/login','User\LoginController@login');
// 前台执行登录
Route::post('/user/dologin','User\LoginController@dologin');
// 前台退出
Route::get('/user/logout','User\LoginController@logout');

//前台注册页
Route::get('/user/register','User\RegisterController@register');
//前台执行注册
Route::post('/user/register','User\RegisterController@insert');




//前台主页方法二
// Route::get('/user/index','User\IndexController@index')->middleware('userlogin');



//前台密码找回
Route::get('user/pass','User\PassController@pass');

//前台用户中心
Route::get('user/center','User\CenterController@center');

//前台详情
Route::get('user/detail','User\DetailController@detail');


// 后台主页
Route::get('/admin/index', 'Admin\IndexController@index');

// 用户管理
Route::get('/admin/user/add','Admin\UserController@add');
Route::post('/admin/user/insert','Admin\UserController@insert');


