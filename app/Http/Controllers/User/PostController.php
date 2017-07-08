<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Http\Model\type;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        return view('user.Post.Post',['title'=>'分类列表','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *创建新的控制器
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $data = type::select('*',\DB::raw("concat(path,',',id) as type_path "))->orderBy('type_path')->get();
        // // 处理
        // foreach ($data as $key => $value) {
        //     // 统计字符串数量
        //     $num = substr_count($value->path,',' ); 
        //     $value->name = str_repeat('---|', $num).$value->name;
        // }
        // // dd($data);
        // return view('user.Post.Add',['title'=>'分类添加','data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     * post表单数据数据的传递处理添加数据
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->except('_token');
        // 判断
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
            return redirect('/post/create')->with(['info'=>'添加成功']);
        }else{
            return redirect('/post/create')->with(['info'=>'添加失败']);
        }
        

    }

    /**
     * Display the specified resource.
     *展示分类详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *修改控制器Get传值
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = type::find(9);
        $All_data = type::select('*',\DB::raw("concat(path,',',id) as type_path "))->orderBy('type_path')->get();
 
        // 处理
        foreach ($All_data as $key => $value) {
            // 统计字符串数量
            $num = substr_count($value->path,',' ); 
            $value->name = str_repeat('---|', $num).$value->name;
        }

        
        return view('user.Post.Edit',['title'=>'分类编辑','data'=>$data,'All_data'=>$All_data]);
    }

    /**
     * Update the specified resource in storage.
     *  POST方法 处理edit GIT方法递交过来的数据
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=$request->except('_token','_method');
        // dd($data)
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

        $type = type::where('id',$id)->update($data);
         
        if($type)
        {
            return redirect('/post')->with(['info'=>'更新成功']);
        }else{
            return back()->with(['info'=>'更新失败']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *删除控制器
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // 判断是否为系统根命名
        // if ($id==0) {
        //     return back()-> with(['info'=>'您没有权限删除系统根目录']);
        // }

        $id='15';
        //删除     
        $type = type::where('id', $id)->delete();

        if($type)
        {
            return redirect('/post')->with(['info'=>'删除成功']);
        }else{
            return back()->with(['info'=>'删除失败']);
        }

    }


}
