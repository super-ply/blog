<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LoginController extends Controller
{
    //后台登陆页
    public function login(){
        return view('admin.login');
    }

    public function dbLogin(){
        $input = $request-> except('_token'); 
        $rule = [
            'username'=>'required|between:4,18',
            'password'=>'required|between:4,18|alpha_dash'

        ];
        $validator = Validator::make($input,$rule);
        if ($validator->fails()){
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }


        //验证是否有此用户
        


        //保存用户信息到session中



        //跳转到后台首页

    }


}
