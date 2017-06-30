<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OneController extends Controller
{
    //
    public function one()
    {
    	return view('user.one.one');
    }
}
