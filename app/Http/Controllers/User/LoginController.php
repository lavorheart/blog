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
}
