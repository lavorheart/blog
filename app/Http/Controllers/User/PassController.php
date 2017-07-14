<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Model\userdetail;
use \App\Http\Model\users;


class PassController extends Controller
{
    //发送邮件
    public function sendEmail(Request $request)
    {	
    	$EmailAddress = $request->EmailAddress;
    	// dd($EmailAddress);
    	// 发送邮件
    	/*\Mail::raw('这是个测试邮件',function($message)
    	{
    		$message->to('lavorheart@aliyun.com');
    		$message->subject('这是邮件的标题');
    	});*/
		
		$data = userdetail::where('email',$EmailAddress)->first();
		$id = $data['uid'];
     	$data =users::
        join('userdetail', function ($join) use($id){
           $join->on('users.id', '=', 'userdetail.uid')
                ->where('users.id', '=', $id);
        })
       ->first();

		$email = $data['email'];
		if (!$email) {
			$request->flash();
			return back()->with(['info'=>'请输入您正确的邮箱']);
		}
		
    	// 发送带模板的邮件==========


    	\Mail::send('mail.mails',['data'=>$data],function($message)
    		use($EmailAddress)
    	{	
    		$message->to($EmailAddress);
    		$message->subject('这是邮件的标题');

    	});

    	// ================


    	// 处理邮箱
    	// 字符串截取从@开始
    	$mail = strstr($data['email'], '@');
    	// 去掉左侧@
    	$mail = ltrim($mail,'@');

    	return view('user.pass.success',['mail'=>$mail]);
    }

    //忘记密码展示主页
    public function forget()
    {	
    	return view('user.pass.pass');
    }
    // 输入新的密码页面
     public function newpass($id)
    {	
    	// dd($id);
    	return view('user.pass.newpass',['id'=>$id]);
    }
     // 输入新的密码链接
     public function link($token)
    {	
    	// dd($token);
    	$res = users::where('remember_token',$token)->first();
    	// dd($res);
    	if($res)
    	{	
    		return redirect('/user/newpass/'.$res->id);
    	}else{
    		return redirect('/user/info')->with(['info'=>'不是一个合法的来源']);
    	}
    }
     // 提示错误信息不是一个合法的来源
     public function info()
    {	
    	return view('user.pass.info');
    }

    public function updatepass(Request $request)
    {
    	$data = $request->except('_token');
        // dd($data);
    	$this->validate($request, [
        'newpassword' => 'required|min:6|max:16',
        'surepassword' => 'required|same:newpassword',
    	],[
    	'newpassword.required'=>'密码不能为空',
    	'newpassword.min'=>'密码最小6位字符',
    	'newpassword.max'=>'密码最大16位字符',
    	'surepassword.same'=>'两次密码输入不一致',
    	'surepassword.required'=>'确认密码不能为空',
    	]);
    	$id = $request->id;
    	$newpassword = encrypt($request->newpassword);
    	$res = users::where('id',$id)->update(['password'=>$newpassword]);
    	if ($res) 
    	{
    		return redirect('/user/login')->with(['info'=>'请登录']);
    	}else{
    		return redirect('user/info')->with(['info'=>'密码修改失败']);
    	}
    }
}
