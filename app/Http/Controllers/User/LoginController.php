<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Model\userdetail;
use \App\Http\Model\users;

class LoginController extends Controller
{
    //
   	//login
   	public function login()
   	{
   		return view('user.Login.login');
   	}

   	//============================================= 执行登录

   	public function dologin(Request $request)
   	{	

   		//获取传递数据=============================
   		$data = $request->except('_token');

   		// 判断是否记住我		
   		$remember_token=\Cookie::get('remember_token');
   		
   		if(\Cookie::get('remember_token')){

   			$res=users::where('remember_token',$remember_token)->first();
            $id = $res->id;
            $user_All =users::
            join('userdetail', function ($join) use($id){
               $join->on('users.id', '=', 'userdetail.uid')
                    ->where('users.id', '=', $id);
            })
           ->first();

   			// 存入session
   			session(['master'=>$user_All]);
   			return redirect('/userHome/'.session('master')->userName.'/blog')->with(['info'=>'恭喜您 登录成功']);
   		}

   		//判断二维码
   		/*$code=Session('code');
   		// dd($code);
   		
   		if ($code != $request->get('code')) {
   			return back()->with(['info'=>'验证码输入错误!']);
   		}*/
   		
   		// 查询数据库预处理条件
   		$userName = $request->userName;

   		// 查找数据库
         $users = users::where('userName',$userName)->first();
         // 获取用户id
         $id = $users->id;
         $user_All =users::
           join('userdetail', function ($join) use($id){
               $join->on('users.id', '=', 'userdetail.uid')
                    ->where('users.id', '=', $id);
           })
           ->first();

         
         	
   		//===============判断用户登录成功事件
   				if ($users)
   				{	

                  //========================开始积分=============
                  $num = $user_All->num;

                  $num+=5;
                  // dd($num);
                  if($num>=0 && $num<=50){
                     
                     $level='新手';
                     
                  }else if($num>=51 && $num<=100){
                     
                     $level='白银';
                     
                  }else if($num>=101 && $num<=150){
                     
                     $level='黄金';
                     
                  }else if($num>=151 ){
                     
                     $level='钻石';
                     
                  }
                     $data = [
                        'num'=>$num,
                        'level'=>$level,
                        'uid'=>$users->id
                     ];
                  // 执行加积分
                  $userdetail_add=userdetail::
                        where('uid', $users->id)
                        ->update($data);

                  // =============登录加积分完毕==============

                  //================================= 获取用户输入密码判断输入密码与数据库密码是否一致
                  $password = \Crypt::decrypt($users->password);

                  if ($password != $request->input('password')) 
                  {
                     return back()->with(['info'=>'密码输入错误']);
                  }

                  // 获取用户名
                  // $user = $user_All->userName;
                  // session([ 'user' => $user]);
                  // 定义常量
                  // define('master', session('user'));
                  // define('master', 'admin');
                  // dd(master);
                  // 讲用户信息存到session master将变量存为常量
   					session([ 'master' =>$user_All]);
                  // ================================密码判断完成===========================

   					// ======判断是否勾选记住我cookie
   					if ($request->input('remember_me')) 
   					{
   						\Cookie::queue('remember_token',$users->remember_token,10);
   					}
                  // 成功处理
   					return redirect('/userHome/'.session('master')->userName.'/blog')->with(['info'=>'恭喜您:登录成功!']);
   				}else{ 
                  // 失败处理
   					return back()->with(['info'=>'该用户不存在']);
   				}
   		
   	}

   	public function logout(Request $request)
   	{	
   		// 清除session
   		$request->session()->forget('master');
   		// return view('user.Login.login')->with(['info'=>'退出成功']);
   		return redirect('/user/login')->with(['info'=>'退出成功']);
   	}

}
?>
