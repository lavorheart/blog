<?php
/**
*引入GetUserData数据库需要的数据表文件
*
*
*/
use \App\Http\Model\userdetail;
use \App\Http\Model\users;


function testFunc()
{
	echo "这是自定义函数";


}


/**
*@param  string  $id url地址递交的用户名
*@return \Illuminate\Http\Response
*@return 用户的详细信息
*@条件需要根绝用户的选项修改数据表以及引用数据库配置数据库信息
*use \App\Http\Model\userdetail;
*use \App\Http\Model\users;
*
*/

function GetUserData($id){
    $userName = $id;
    // 查找数据库
     $users = users::where('userName',$userName)->first();
     // 获取用户id
     $id = $users->id;
     $data =users::
       join('userdetail', function ($join) use($id){
           $join->on('users.id', '=', 'userdetail.uid')
                ->where('users.id', '=', $id);
       })
       ->first();
     $data = $data->ToArray();
     return $data;
    }


?>