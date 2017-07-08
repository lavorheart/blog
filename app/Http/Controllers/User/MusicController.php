<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MusicController extends Controller
{
    //相册控制器
    public function Music()
    {
    	return view('user.Music.Musics');
    }
    
}
