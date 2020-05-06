<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function index(){
        return view('admin.index');
    }
    public function dologin(Request $request){
        //1.接受表单提供的数据
        $input = $request->except('_token');
        //dd($input);
        // 2.进行表单验证
        //     $validator = Validator::make('需要验证的表单数据','验证规则','错误提示信息')；
        $rule = [
            'username'=>'required|between:4,18',
            'password'=>'required|between:4,18|alpha_dash',
            'verifycode'=>'required',

        ];
        $msg = [
            'username.required'=>'用户名必须输入',
            'password.required'=>'密码必须输入',
            'verifycode.required'=>'验证码必须输入',
        ];
        $validator = Validator::make($input,$rule,$msg);

        if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }
        //3.验证是否有此用户
        
        //验证验证码是否正确
        if($input['verifycode'] != session()->get('verifycode')){
            return redirect('admin/login')->with('errors','验证码错误');
        }

        $user = User::where('name',$input['username'])->get();
        foreach ($user as $item) {
            $password = $item->password; 
        }
        //验证是否存在用户
        if(!$user){
            return redirect('admin/login')->with('errors','用户名错误');
        }
        //验证密码是否正确
        if($input['password'] != Crypt::decrypt($password)){
            return redirect('admin/login')->with('errors','密码不正确');
        }
        //保存用户信息到session中
        session()->put('user',$user);
        //跳转主页
        return redirect('admin/index');

    }


    public function jiami(){
        $str = 'admin';
        $crypt_str = 'eyJpdiI6IjdLVnExaTNNQlRXS202N1RUc0UxZUE9PSIsInZhbHVlIjoiakZKZTNjb3BHaWFTWEdPSnd6eFIrQT09IiwibWFjIjoiMDUzNjlmYTJmNzYwZDJkMmZlMjU4OGRmNzZiNDU3YmRhZTA4Mjc3ZmY1NmYxNGMzNjNjNzJhMDM4ZjE5Y2MzMyJ9';
        if(Crypt::decrypt($crypt_str) == $str){
        return "密码正确";
        }

    }
}
