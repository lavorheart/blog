<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PassController extends Controller
{
    //
    public function pass()
    {
    	return view('User.pass.pass');
    }
}
