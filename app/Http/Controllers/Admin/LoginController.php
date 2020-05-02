<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    

    public function dologin(Request $request){
        //1.接受表单提供的数据
        $input = $request->except('_token');
        dd($input);
        // 2.进行表单验证
        //     $validator = Validator::make('需要验证的表单数据','验证规则','错误提示信息')；
        $rule = [
            'username'=>'required|between:4,18',
            'password'=>'required|between:4,18|alpha_dash'

        ];
        $msg = [
            'username.required'=>'用户名必须输入',
            'password.required'=>'密码必须输入'
        ];
        $validator = Validator::make($input,$rule,$msg);

        if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }
        //3.验证是否有此用户
        $user = User::where('user_name',$input(['username']))->first();
        if(!$user){
            return redirect('admin/login')->with('errors','用户名为空');
        }
        

    }
}
