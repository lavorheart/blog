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

<<<<<<< HEAD
//前台主页
Route::get('/user/index','User\IndexController@index');

//前台登录页
Route::get('/user/login','User\LoginController@login');

//前台注册页
Route::get('user/zhuce','User\ZhuceController@zhuce');

//前台密码找回
Route::get('user/pass','User\PassController@pass');

=======
//前台登录页
Route::get('/user/login','User\LoginController@login');
Route::post('/user/login','User\LoginController@insert');

//前台注册页
Route::get('user/register','User\RegisterController@register');


//前台主页
Route::get('/user/index','User\IndexController@index');



//前台密码找回
Route::get('user/pass','User\PassController@pass');

>>>>>>> 15049180e44f98c036e91600f443db97c9e34ee2
//前台用户中心
Route::get('user/center','User\CenterController@center');

//前台详情
Route::get('user/detail','User\DetailController@detail');

//前台个人主页
Route::get('/user/one','User\OneController@one');

// 后台主页
Route::get('/admin/index', 'Admin\IndexController@index');

// 用户管理
Route::get('/admin/user/add','Admin\UserController@add');
Route::post('/admin/user/insert','Admin\UserController@insert');


