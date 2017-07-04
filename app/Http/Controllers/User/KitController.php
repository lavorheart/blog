<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class KitController extends Controller
{
    //
    public function captcha($tmp)
    {	
    	// 清除缓存区
    	ob_get_clean();
    	// 生成验证码图片的Builder对象,配置相应属性
    	$bulider = new CaptchaBuilder;
    	// 设置图片的宽高以及字体
    	$bulider->build($width = 100,$height = 40,$font = null);
    	// 获取验证码的内容
    	$phrase = $bulider->getPhrase();
    	// dd($phrase);
    	// 把内容存入session
    	Session::flash('code',$phrase);
    	// 生成图片
    	header("Cache-Control: no-cache,must-revalidate");
    	header('Content-Type: image/jpeg');
    	$bulider->output();
    }
}
