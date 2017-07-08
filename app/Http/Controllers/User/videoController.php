<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class videoController extends Controller
{
    //视频控制器
    public function video()
    {
    	return view('user.video.videos');
    }
}
