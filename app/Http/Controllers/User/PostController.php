<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Model\userdetail;
use \App\Http\Model\users;
use \App\Http\Model\friendlink;
use \App\Http\Model\config;
use \App\Http\Model\adv;
use \App\Http\Model\type;
use \App\Http\Model\reply;
use \App\Http\Model\post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 文章编辑搜索主页控制器
     */
    public function index(Request $request,$userName)
    {   

        $id = $request->input('id');

        // 自定义函数引用展示layouts部分信息
        $UrlData = GetUrlData($userName);
        $title ='文章列表';
        $userName = $userName;
        // 所有控制器必传参数

        //获取用户的关键字
        $Keywords = $request->Keywords;
        $tid = $request->input('tid');
        $uid = $UrlData['users']['id'];

        
        // 控制分页大小$num
        $num = 5;
        // 判断是否传了模糊查询tid父类
        if ($tid) 
        {
            $post = post::where('uid',$uid)->where('tid',$tid)->orderBy('ctime_post','desc')->paginate($num);   
        }else{
            $post = post::where('uid',$uid)->orderBy('ctime_post','desc')->paginate($num);
        }
        // 判断是否传了模糊查询关键字
        if ($Keywords) 
        {
            $post = post::where('title','like','%'.$Keywords.'%')->where('uid',$uid)->orderBy('ctime_post','desc')->paginate($num);   
        }
        // 判断用户是否传了博文的ID数据
        if ($id) 
        {
            $post = post::where('id',$id)->orderBy('ctime_post','desc')->paginate($num);
        }


        // 获取变量值
        $request = $request->all();
         
        // 分页搜索
       
        
        return view('user.Post.Post',compact('UrlData','title','userName','post','request'));

    }

    /**
     * Show the form for creating a new resource.
     *文章发布页控制器
     * @return \Illuminate\Http\Response
     */
    public function create($userName)
    {
        $UrlData = GetUrlData($userName);
        $title ='创建博文';
        $userName = $userName;
        // 所有控制器必传参数
        $data = type::select('*',\DB::raw("concat(path,',',id) as type_path "))->orderBy('type_path')->get();
         // 处理
        foreach ($data as $key => $value) {
            // 统计字符串数量
            $num = substr_count($value->path,',' ); 
            $value->name = str_repeat('---|', $num).$value->name;
        }
        return view('user.Post.Add',compact('UrlData','title','userName','data'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * 
     * 接收文章发布控制器
     */
    public function store(Request $request,$userName)
    {  

       // 获取递交信息
       $data = $request->except('_token','logo_post');
       // dd($data['logo_post']);
       //获取用户ID
       $uid = users::where('userName',$userName)->first()->id;
       $data['uid'] = $uid;
       $data['ctime_post'] = date('Y-m-d h:i:s');

       if ($request->hasFile('logo_post'))
           {
               if ($request->file('logo_post')->isValid()) 
               {
                 // 获取扩展名
                 $ext = $request->file('logo_post')->extension();

                 // 随机文件名
                 $filename = time().'.'.$ext;
                 $data['logo_post'] = $filename;
                 
                 // -----------------插入数据
                 $id = post::insertGetId($data);
                 // -------------------

                 // 移动文件
                 $request->file('logo_post')->move('./user/images/post/',$filename);
                  //===================== 删除原有图片-------------
                 $post = post::find($id);

                 $post = $post -> ToArray();

                 $post = $post['logo_post'];
                 
                 // 判断不删除系统默认图片
                 if ($post != 'default.jpg') {
                    @unlink('./user/images/photo/'.$blogo);
                 }
                  //===================== 删除原有图片-----------  
               }
          }
       
        
        return back()-> with(['info'=>'恭喜您文章发布成功']);
    }

    /**
     * Display the specified resource.
     *
     * 
     * 文章详情控制器
     */
    public function show(Request $request,$userName ,$id)
    {   
        // 自定义函数
        $UrlData = GetUrlData($userName);
        $title ='博文详情页';
        $userName = $userName;
        // 所有控制器必传参数

       
        // --------获取博文的信息
        $post = post::find($id);
        $tid = $post->tid;
        $post = $post->ToArray();
        // ----------获取博文信息结束

        // -----------获取本博文分类信息
        $type = type::find($tid);
        $type=$type->ToArray();
        //--------------


        // --------------------获取回复信息
        // 获取评论数量
        $num=0;
        $reply = reply::where('pid_reply',$id)->get();
        foreach ($reply as $key => $value) {
            $num+=1;
            $value->uid;
            
            // 把回复人拼接到数组中
            $userdetail = userdetail::where('uid',$value->uid)->first();
            $reply[$key]['nickName'] = $userdetail->nickName;
            $reply[$key]['photo'] = $userdetail->photo;
           
        }
        $reply=$reply->ToArray();
        // dd($reply);
        // --------------------获取回信息结束
        
        return view('user.Post.Show',compact('UrlData','title','userName','num','reply','post','type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     * 文章回复控制器
     */
    public function edit(Request $request,$userName,$id)
    {   

        // 回复内容
        $uid = (session('master')->id);
        $pid_reply = $id;
        $content_reply = $request->content_reply;
        $ctime_reply = date('Y-m-d h:i:s');
        
        $data = [];
        $data = [
            'uid'=>$uid,
            'pid_reply'=>$pid_reply,
            'content_reply'=>$content_reply,
            'ctime_reply'=>$ctime_reply
        ];
        
        $data = reply::insertGetId($data);
        if ($data) {

            return redirect('/userBG/'.$userName.'/post')->with(['info'=>'恭喜您博文回复成功']);
        }else{
            return back()->with(['info'=>'很抱歉博文回复失败']);
        }

       
    }

    /**
     * Update the specified resource in storage.
     *  POST方法 处理edit GIT方法递交过来的数据
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userName,$id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *删除控制器
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userName,$id)
    {   
        

    }


}
