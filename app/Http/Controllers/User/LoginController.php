<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
   	//login
   	public function login()
   	{
   		return view('user.Login.login');
   	}

   	public function insert(Request $request)
   	{	
   		$data = $request->except('_token');
   		echo "这是主页";
   		// $userName = $data['userName'];
   		$userName = $request->userName;
   		// $password = $data['password'];
   		$password = $request->password;
   		// var_dump($userName,$password);

   		// $this->validate($request, [
     //    'username' => 'required|unique:p_users|max:255',
     //    'password' => 'required',
    	// ]);

   		// dd( $request->all());
   		$users = \DB::table('users')->where('userName', $userName)->first();
   		// var_dump($users);

   		if ($users->password== $password && $users->userName== $userName)

   				{

   					return redirect('/user/index', $users);
   				}	
   		
   	}

}
?>