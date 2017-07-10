<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Model\userdetail;
use \App\Http\Model\users;

class RegisterController extends Controller
{	
	// 显示注册页
    public function register()
    {
    	return view('User.register.register');
    	
    }
    // 接收注册页信息
    public function insert(Request $request)
    {	
    	// 获取数据
    	$userName = $request->userName;
   		$password = \Crypt::encrypt($request->password);
   		$remember_token = str_random(50);
   		
   		// 验证数据库文件真实HTTP表单验证
   	/*	$this->validate($request, [
        'userName' => 'required|unique:users|min:6|max:16',
        'password' => 'required|min:6|max:16',
        'surepassword' => 'required|same:password',
    	],[
    	'userName.min'=>'用户名最小6位字符',
    	'userName.unique'=>'用户名已存在',
    	'userName.max'=>'用户名最大16位字符',
    	'userName.required'=>'用户名不能为空',
    	'password.required'=>'密码不能为空',
    	'password.min'=>'密码最小6位字符',
    	'password.max'=>'密码最大16位字符',
    	'surepassword.same'=>'两次密码输入不一致',
    	'surepassword.required'=>'确认密码不能为空',
    	]);*/
   		
   		// $lastlogin = date('Y-M-D h:i:s');
   		$created_at = date('Y-m-d h:i:s');
   		$updated_at = date('Y-m-d h:i:s');
   		// dd($created_at);
   		// 数据库操作
      $uid = users::insertGetId(
         [
        "userName" => $userName,
        "password" => $password,
        "created_at" => $created_at,
        "updated_at" => $updated_at,
        "remember_token" => $remember_token,
      ]
        );
      
   		
   		// 结果处理用户登录加积分
   		// ============================登录加积分============================================
   		$userdetail=userdetail::insertGetId(['uid'=>$uid]);
   		// 查找数据
      $userdetail =users::
        join('userdetail', function ($join) use($uid){
            $join->on('users.id', '=', 'userdetail.uid')
                 ->where('userdetail.uid', '=', $uid);
        })
        ->get();
        // dd($userdetail);
        foreach ($userdetail as $key => $value) {
          $num = $value->num;
        }
   		
   		
 		//开始积分
		$num+=10;
	 	if($num>=0 && $num<=50){
			
			$level='新手';
			
		}else if($num>=51 && $num<=100){
			
			$level='白银';
			
		}else if($num>=101 && $num<=150){
			
			$level='黄金';
			
		}else if($num>=151){
			
			$level='钻石';
			
		}
			$data = [
				'num'=>$num,
				'level'=>$level,
				'uid'=>$uid
			];
		// 执行加积分
		  $userdetail_add=userdetail::
      where('uid', $uid)->update($data);

      if ($uid && $userdetail && $userdetail_add) 
      {	
        	session(['master'=>$userdetail]);
   			return redirect('/user/login')->with(['info'=>'恭喜您 注册成功']);

   		}else{
   			return back()->with(['info'=>'登录错误']);
   		}
			
    }

}
