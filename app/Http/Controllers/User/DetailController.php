<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DEtailController extends Controller
{
    //
    //detail
    public function detail()
    {
    	return view('user.detail.detail');
    }
}
