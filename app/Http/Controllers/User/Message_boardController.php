<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Message_boardController extends Controller
{
    //留言板控制器
    public function Message_board()
    {
    	return view('user.Message_board.Message_board');
    }
    
}
