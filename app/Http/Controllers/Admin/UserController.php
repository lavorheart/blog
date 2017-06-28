<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function add()
    {
    	return view('admin.user.add');
    }

    public function insert(Request $request )
    {
    	// dd($request->all());
    	$this->validate($request,[
    			'name' => 'required|unique:users|max:18|min:6',
    			'email' => 'required|email|unique:users',
    			'password' => 'required',
    			're_password' => 'same:password',
    			'avatar' => 'image|required'
    		],[
    			'name.required' => '用户名不能为空',
    			'name.unique' => '用户名已存在',
    			'name.min' => '用户名最小6个字符',
    			'name.max' => '用户名不能超过18个字符',
    			'email.email' => '请输入正确的邮箱',
    			'email.required' => '邮箱不能为空',
    			'email.unique' => '您输入的邮箱已存在',

    			'password.required' => '密码不能为空',
    			're_password.same' => '确认密码不一至',
    			'avatar.image' => '请上传正确的头像',
    			'avatar.required' => '头像不能为空' 
    		]);


    	$data = $request->except('_token','re_password');
    	// dd($data);

    	// 密码加密
    	$data['password'] = encrypt($data['password']);
    	$password = decrypt($data['password']);
    	// echo $password;
    	// dd($data);


    	// 处理图片
    	if ($request->hasFile('avatar'))
    	{
    		
    		if ($request->file('avatar')->isValid())
    		{
    			// 获取扩展名
    			$ext = $request ->file('avatar')->extension();
    			// 随机文件名
    			$filename = time().mt_rand(1000000,9999999).'.'.$ext;

    			// 移动
    			$request->file('avatar')->move('./uploads/avatar',$filename);

    			// 添加data数据
    			$data['avatar'] = $filename;
    		}
    	}

    	// 处理token
    	$data['remember_token'] = str_random(50);

    	// 处理时间
    	$time = date('Y-m-d H:i:s');
    	$data['created_at'] = $time;
    	$data['updated_at'] = $time;
    	// dd($data);

    	// 执行添加
    	$res = \DB::table('users')->insert(
    		
    		$data
    		
    		);

    	if ($res)
    	{
    		return redirect('/admin/user/index')->with(['info' => '添加成功']);

    	}else{
    		return back() -> with(['info' => '添加失败']);
    	}

    }

    // index
    public function index()
    {
    	return '用户列表';
    }
}
