<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Model\type;

class TypeIndexController extends Controller
{
    
    public function TypeIndex()
    {
        //
        $data = type::select('*',\DB::raw("concat(path,',',id) as type_path "))->orderBy('type_path')->get();
 
        // 处理
        foreach ($data as $key => $value) {
            // 统计字符串数量
            $num = substr_count($value->path,',' ); 
            $value->name = str_repeat('---|', $num).$value->name;
        }
        // dd($value->id);
        return view('user.Post.Typeindex',['title'=>'分类列表','data'=>$data]);
    }
}
