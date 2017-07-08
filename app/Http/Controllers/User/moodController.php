<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class moodController extends Controller
{
    //心情状态控制器
     public function mood()
    {
    	return view('user.mood.mood');
    }
}
