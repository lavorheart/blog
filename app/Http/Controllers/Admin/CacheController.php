<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CacheController extends Controller
{
    //cache
    public function cache()
    {	
    	$minutes = 10;
    	\Cache::put('1', '2', $minutes);
    }
}
