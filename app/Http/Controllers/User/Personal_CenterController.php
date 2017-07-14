<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Model\userdetail;
use \App\Http\Model\users;

class Personal_CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userName)
    {   
       
       // ==============用这个方法可以做成多用户===
        $data = GetUserData($userName);

        //--- 自定义函数获取用户所有数据

        $UrlData = GetUrlData($userName);
        // dd($UrlData);
        $title ='用户页面';
        $userName = $userName;
        // dd($data);
        // ---所有控制器必传参数

        return view('user.Personal_Center.admin.Personal_Centers',compact('UrlData','title','userName','data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 添加数据页面
    public function create()
    {
        
      
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$userName)
    {   

        //获取数据
        $data=$request->except('_token','_method','userName');
        // 获取递交的用户名
        $userName = $request->userName;
        // 调用自定义函数获取用户的所有原始数据
        $users=GetUserData($userName);

        // 获取用户id
        $id = $users['id'];
        
        if ($request->hasFile('photo'))
           {
               if ($request->file('photo')->isValid()) 
               {
                 // 获取扩展名
                 $ext = $request->file('photo')->extension();
                 // 随机文件名
                 $filename = time().'.'.$ext;
                 $data['photo'] = $filename;  
                 // 移动文件
                 $request->file('photo')->move('./user/images/photo/person',$filename); 
                 //===================== 删除原有图片-------------
                 $userdetail = userdetail::find($id);
                 $userdetail = $userdetail -> ToArray();
                 $photo = $userdetail['photo'];
                 
                 // 判断不删除系统默认图片
                 if ($photo != 'default.jpg') {
                    @unlink('./user/images/photo/person/'.$photo);
                 }
                  //===================== 删除原有图片-----------
               }
          }
        // -----------------------修改数据-------------
        $userdetail = userdetail::where('id',$id)->update($data);
        if($userdetail)
        {   
            return redirect('/userBG/'.$userName.'/Personal_Center/')->with(['info'=>'用户信息更新成功']);
        }else{
            return back()->with(['info'=>'用户信息更新失败']);
        }
        // -----------------------修改数据-------------
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userName,$id)
    {
        //添加页面
        $data = userdetail::find($id);

        //--- 自定义函数获取用户所有数据

        $UrlData = GetUrlData($userName);
        $title ='修改密码';
        $userName = $userName;
        // dd($UrlData,$data);
        // ---所有控制器必传参数
        return view('user.Personal_Center.admin.Edit',compact('UrlData','title','userName','data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userName, $id)
    {   
        
        $UrlData = GetUrlData($userName);
        // dd($UrlData);
        $title ='分类添加';
        $userName = $userName;

        //获取查询条件建立uid = id的关键字段
        $data = $request ->except('_token','_method');
        $data = userdetail::find($id);
        $uid = $data['uid'];

        // 两表联查
        $user_All =users::
        join('userdetail', function ($join) use($uid){
            $join->on('users.id', '=', 'userdetail.uid')
                 ->where('userdetail.uid', '=', $uid);
        })
        ->get();
        // dd($user_All);
        foreach ($user_All as $key => $value) {
            $oldpassword = $value->password;
            $oldpassword = \Crypt::decrypt($oldpassword);
            // 取出变量拼装url地址栏
            $userName = $value->userName;
            // dd($userName);
            // dd($oldpassword,$request->oldpassword);
        }


        // 判断输入的原密码是否正确
        if ($oldpassword != $request->oldpassword) 
        {
            return back()->with(['info'=>'原密码输入不正确']);
        }else{

            // 获取新的密码
            $newpassword = $request->newpassword;

            $newpassword = \Crypt::encrypt($newpassword);
            // dd($newpassword);
            // 清空数组
            $data =[];
            // 重新建立关联
            $data = ['password'=>$newpassword];
            // dd($data);
            users::where('id',$uid)->update($data);
            return redirect('/userBG/'.$userName.'/Personal_Center/')->with(['info'=>'密码修改成功']);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
