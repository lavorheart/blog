<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    //相册控制器
    public function Album()
    {
    	return view('user.Album.Album');
    }

}
