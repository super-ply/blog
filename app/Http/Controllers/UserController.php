<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\test;
//use App\Article;
class UserController extends Controller
{
    //添加方法
    public function add()
    {
        return view('user.add');
    }
    public function store(Request $request)
    {
        $input = $request->except("_token");
        $input['password'] = md5($input['password']);
        //dd($input);
        $res = test::create(['username'=>$input['username'],'password'=>$input['password']]);
        //$res = User::create($input);
        //dd($res);
        if($res){
            return redirect('user/index');
        }else{
            return back();
        } 
    }
    public function index()
    {
        $user = test::get();
        return view('user.list',compact('user'));
    }

    public function edit($id)
    {
        $user = test::find($id);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request)
    {
        $input =$request ->all();
        //dd($input);
        $user = test::find($input['id']);
        $res = $user->update(['username'=>$input['username']]);
        if($res){
            return redirect('user/index');
        }else{
            return back();
        }
    }
        
    
}
