<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|{{ url('')}}3161397178
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// 前台登录限制控制组
Route::group(['middleware'=>'userlogin'],function(){
	
});
//前台主页
Route::get('/','User\IndexController@index');
// 验证码
Route::get('/kit/captcha/{tmp}','User\KitController@captcha');
//前台登录页
Route::get('/user/login','User\LoginController@login');
// 前台执行登录
Route::post('/user/dologin', 'User\LoginController@dologin');
// 前台退出
Route::get('/user/logout','User\LoginController@logout');
//前台注册页
Route::get('/user/register','User\RegisterController@register');
//前台执行注册
Route::post('/user/register','User\RegisterController@insert');
//前台密码找回
Route::get('user/pass','User\PassController@pass');
//前台用户中心
Route::resource('/Personal_Center','User\Personal_CenterController');

//================================================


//前台文章详情
Route::get('/user/detail','User\DetailController@detail');
/**
*
*
*/
//前台帖子列表页
Route::resource('/post','User\PostController');



// ==================mood

//前台留言板
Route::get('/Message_board','User\Message_boardController@Message_board');
// 心情编辑
Route::get('/mood','User\moodController@mood');


// 相册
Route::get('/Album','User\AlbumController@Album');
// 音乐
Route::get('/Music','User\MusicController@Music');
// 视频
Route::get('/video','User\videoController@video');
// 博友
Route::get('/Friend','User\FriendController@Friend');







// 后台登录限制控制组
Route::group(['middleware'=>'adminlogin'],function(){
	
});

// 测试用redis缓存
// Route::get('/cache','Admin\CacheController@cache');
// 自定义函数类多表查询
Route::get('/test','Admin\testController@test');
// model类的引用方法
Route::get('/model','Admin\testController@model');
