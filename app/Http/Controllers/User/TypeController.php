<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Model\type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // ==============用这个方法可以做成多用户===
        // 获取传递数据
        $id = $request->userName;
        // ==============用这个方法可以做成多用户===
        $data = GetUserData($id);
        $userName = $id;
        // dd($userName);
        $uid = $data['id'];

        $data = type::select('*',\DB::raw("concat(path,',',id) as type_path "))->where('uid',$uid)->orderBy('type_path')->get();
        // 处理
        foreach ($data as $key => $value) {
            // 统计字符串数量
            $num = substr_count($value->path,',' ); 
            $value->name = str_repeat('---|', $num).$value->name;
        }
        // dd($data);
        return view('user.Type.admin.Add',['title'=>'分类添加','data'=>$data,'userName'=>$userName]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->except('_token','userName');
        $userName = $request->userName;
        $res = GetUserData($userName);
        // dd($userName);
        // 用的的uid
        $uid = $res['id'];
        
        // 判断
        $data['uid'] = $uid;
        if ($data['pid']==0) {
            $data['path'] = 0;
        }else{
            // 查询父类的path
            $parent_path = type::where('id',$data['pid'])->first()->path;
            // 新添加的path
            $data['path'] = $parent_path.','.$data['pid'];
        }
        // 插入数据
        $type = type::insertGetId($data);
        if($type)
        {
            return redirect('/userBG/Type/create?userName='.$userName)->with(['info'=>'添加成功']);
        }else{
            return redirect('/userBG/Type/create?userName='.$userName)->with(['info'=>'添加失败']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         //
        // ==============用这个方法可以做成多用户===
        $data = GetUserData($id);
        $userName = $id;
        // dd($userName);
        $uid = $data['id'];
        // $uid = 2;
        $data = type::select('*',\DB::raw("concat(path,',',id) as type_path "))->where('uid',$uid)->orderBy('type_path')->get();
        // dd($data);
        // 处理
        foreach ($data as $key => $value) {
            // 统计字符串数量
            $num = substr_count($value->path,',' ); 
            $value->name = str_repeat('---|', $num).$value->name;
        }
        // dd($value->id);
        return view('user.Type.admin.Typeindex',['title'=>'分类列表','data'=>$data,'userName'=>$userName]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {   
        $userName =$request->userName;
        // 判断是否为系统根命名
        if ($id==0) {
            return back()-> with(['info'=>'您没有权限编辑系统根目录']);
        }

        $data = type::find($id);
        $All_data = type::select('*',\DB::raw("concat(path,',',id) as type_path "))->orderBy('type_path')->get();
 
        // 处理
        foreach ($All_data as $key => $value) {
            // 统计字符串数量
            $num = substr_count($value->path,',' ); 
            $value->name = str_repeat('---|', $num).$value->name;
        }

        
        return view('user.Type.admin.Edit',['title'=>'分类编辑','data'=>$data,'All_data'=>$All_data,'userName'=>$userName]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userName = $request->userName;
        // ==============用这个方法可以做成多用户===
        $res = GetUserData($userName);
        $uid = $res['id'];
        // dd($uid);

        $data=$request->except('_token','_method','userName');
        // dd($data);
          if ($request->hasFile('blogo'))
           {
               if ($request->file('blogo')->isValid()) 
               {
                 // 获取扩展名
                 $ext = $request->file('blogo')->extension();
                 // 随机文件名
                 $filename = time().'.'.$ext;
                 $data['blogo'] = $filename;  
                 // 移动文件
                 $request->file('blogo')->move('./user/images/photo',$filename);  
                  //===================== 删除原有图片-------------
                 $type = type::find($id);

                 $type = $type -> ToArray();

                 $blogo = $type['blogo'];
                 
                 // 判断不删除系统默认图片
                 if ($blogo != 'default.jpg') {
                    @unlink('./user/images/photo/'.$blogo);
                 }
                  //===================== 删除原有图片-----------  
               }
          }

        if ($data['pid']==0) {
            $data['path'] = 0;
        }else{
            // 查询父类的path
            $parent_path = type::where('id',$data['pid'])->first()->path;
            // 新添加的path
            $data['path'] = $parent_path.','.$data['pid'];
        }
        // 获取uid
        $data['uid']=$uid;
        // dd($data);
        $type = type::where('id',$id)->update($data);
         
        if($type)
        {
            return redirect('/userBG/Type/'.$userName)->with(['info'=>'更新成功']);
        }else{
            return back()->with(['info'=>'更新失败']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {   
        $userName = $request->userName;
        // dd($userName);

        // 判断是否为系统根命名
        if ($id==0) {
            return back()-> with(['info'=>'您没有权限删除系统根目录']);
        }
        //删除
        $type = type::where('id', $id)->delete();

        if($type)
        {
            return redirect('/userBG/Type/'.$userName)->with(['info'=>'删除成功']);
        }else{
            return back()->with(['info'=>'删除失败']);
        }
    }


}
