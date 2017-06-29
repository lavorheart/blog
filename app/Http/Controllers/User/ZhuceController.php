<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZhuceController extends Controller
{
    //
    //detail
    public function zhuce()
    {
    	return view('user.zhuce.zhuce');
    }

    
}
