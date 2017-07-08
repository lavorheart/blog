<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Model\userdetail;

class testController extends Controller
{
    //test
    public function test()
    {	
    	// 自定义函数
    	testFunc();
    	// 自定义类
    	$mv = new \App\libs\Girl();
    	$mv->sing();
    	// 多表联查
    	$users = \DB::table('users')
            ->join('userdetail', 'users.id', '=', 'userdetail.uid')
            ->select('users.userName', 'userdetail.nickName')
            ->get();
        $users = \DB::table('users')
            ->leftJoin('userdetail', 'users.id', '=', 'userdetail.uid')
            ->select('users.*', 'userdetail.*')
            ->orderBy('userdetail.id', 'desc')
            ->get();
         foreach ($users as $key => $value) {
         	$a = $value->userName;
         	dd($a);
         }
         
        
    }

    public function model()
    {
    	$data = userdetail::get();
    	foreach ($data as $key => $value) {
    		echo $value->uid;
    	}
    	
    	$data = userdetail::find(10);
    	$userdetail = new userdetail;
    	$userdetail->nickName='张三';
    	$userdetail->save();

    	dd($data);
    	
    }

}
