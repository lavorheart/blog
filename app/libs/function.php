<?php
/**
*引入GetUserData数据库需要的数据表文件
*
*
*/
use \App\Http\Model\userdetail;
use \App\Http\Model\users;
use \App\Http\Model\friendlink;
use \App\Http\Model\config;
use \App\Http\Model\adv;
use \App\Http\Model\type;
use \App\Http\Model\reply;
use \App\Http\Model\post;


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







/**
*@param  string  $userName url地址递交的用户名
*@函数作用根绝URL地址获取用户所有数据
*@return 获取用户所有数据
*@条件需要根绝用户的选项修改数据表以及引用数据库配置数据库信息
* dd($UrlData);
*       使用方法1
*       dd($UrlData['userdetail']['photo']);
*			
*        /使用方法2
*       foreach ($UrlData['type'] as $key => $value) {
*               var_dump($value['name']);
*      }
*      @foreach($UrlData['type'] as $v) 
* 				{{ $v['name']}}
* 	   @endforeach
*
*/

function GetUrlData($userName){
//需要提供$userName ==============================获取用户相关联信息开始===============


        // 用户表信息
        $users = users::where('userName',$userName)->first();
        $users = $users->ToArray();
 

         //------------------------获取用户id建立公共查询条件

        $id = $users['id'];

        // -------------------------


        //用户表的数据获取 
        $userdetail = userdetail::where('uid',$id)->first();
        $userdetail = $userdetail->ToArray();
 
         // type表信息
         $type = type::select('*',\DB::raw("concat(path,',',id) as type_path "))
                ->where('uid',$id)
                ->where('pid','0')
                ->orderBy('type_path')
                ->limit('3')
                ->get();
        $type = $type->ToArray();
        // dd($type);



         //============================================获取用户发帖后被回复的所有信息 ==============
        // 获取用户发了多少博文
        $post = post::where('uid',$id)
                ->orderBy('ctime_post','asc')
                ->get();
        $post = $post->ToArray();
        // --------------------获取回复信息
        
        // 发帖量
        $num_post =0;
        foreach ($post as $key => $value) 
        {
            // 发帖量
            $num_post+=1;
            $post[$key]['num_post'] = $num_post;

            // =============================================帖子的id查找回帖信息==========
            $pid_reply = $value['id'];
            $reply = reply::orderBy('ctime_reply','asc')->get();
            foreach ($reply as $k => $value) 
            {
                if ($value->pid_reply == $pid_reply) 
                {   

                    $pid_replys = $pid_reply;

                }
            }
                
        }
         
        // 获取评论数量
        $num_reply=0;
        $reply = reply::where('pid_reply',$pid_replys)->orderBy('ctime_reply','asc')->get();
        $reply = $reply->ToArray();
                foreach ($reply as $key => $value) {
                   // 回帖量统计
                $num_reply+=1;
                $reply[$key]['reply_num'] = $num_reply;

                // 回帖人uid
                $uid = $value['uid'];
                // dd($uid);
                // 通过回帖人uid查找用户名nickName
                $userName = userdetail::where('uid',$uid)->first()->nickName;
                
                // 回帖人存入数组
                $reply[$key]['reply_userName'] = $userName;

                }
           
        //获取用户被会的帖子的信息结束 ---------只能查找一条 ---功能待完善
        


        // post表信息
         $post = post::where('uid',$id)
                ->orderBy('ctime_post','desc')
                ->limit('3')
                ->get();
        $post = $post->ToArray();

        // dd($post);

        // ==============================用户相关联信息结束===============
        

        // ==============================获取网站配置信息开始===============

        
        // config表信息  1开启服务器0关闭服务器
        $config = config::where('status','1')->first();
        $config = $config->ToArray();

        //------------获取配置项关联id-----
        $id = $config['id'];
        //------------获取配置项关联id结束-----


        // friendlink表信息
        $friendlink = friendlink::where('cf_id',$id)->get();
        $friendlink = $friendlink->ToArray();
        // dd($friendlink);

        // adv表数据信息
        $adv = adv::where('cf_id',$id)->get();
        $adv = $adv->ToArray();
        // dd($adv);

         // ==============================获取网站配置信息结束===============



        //------拼装URL获取用户信息开始数组-------------


        $UrlData = [];

        $UrlData = [
        'users'=>$users,
        'type'=>$type,
        'reply'=>$reply,
        'userdetail'=>$userdetail,
        'post'=>$post,
        'config'=>$config,
        'friendlink'=>$friendlink,
        'adv'=>$adv
        ];

        //------拼装URL获取用户信息开始数组结束-------------
        return $UrlData;

        
}



?>