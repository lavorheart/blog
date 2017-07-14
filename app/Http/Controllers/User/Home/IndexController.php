<?php

namespace App\Http\Controllers\User\Home;

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


class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($userName)
    {   
        // dd($userName);
        // 自定义函数获取用户所有数据
        $UrlData = GetUrlData($userName);
        $title ='网站首页';
        $userName = $userName;
        // 所有控制器必传参数
        
        // return view('user.index.index',['title'=>'网站首页','userName'=>$userName]);
        return view('user.index.index',compact('UrlData','title','userName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
