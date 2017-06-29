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

<<<<<<< HEAD
Route::get('/User/index','User\IndexController@index');

Route::get('/User/login','User\LoginController@login');

Route::get('User/pass','User\PassController@pass');

Route::get('User/center','User\CenterController@center');

Route::get('User/detail','User\DetailController@detail');
=======
// 后台主页
Route::get('/admin/index', 'Admin\IndexController@index');

// 用户管理
Route::get('/admin/user/add','Admin\UserController@add');
Route::post('/admin/user/insert','Admin\UserController@insert');
>>>>>>> 0e5ed8031aec7381eacdce038773d85ed0f45ac9
