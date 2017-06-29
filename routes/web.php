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

Route::get('/User/index','User\IndexController@index');

Route::get('/User/login','User\LoginController@login');

Route::get('User/pass','User\PassController@pass');

Route::get('User/center','User\CenterController@center');

Route::get('User/detail','User\DetailController@detail');