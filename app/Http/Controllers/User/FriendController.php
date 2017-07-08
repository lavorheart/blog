<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{
    //博友控制器
    public function Friend()
    {
    	return view('user.Friend.Friends');
    }
}
