<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tools\Captcha;
use Illuminate\Support\Facades\Log;

class CaptchaController extends Controller
{
    public function create()
    {
        Log::info("asdasd");
        $verify = new Captcha();
        $code = $verify->getCode();
        //var_dump($code);
       session(['verifycode'=>$code]);
       return $verify->doimg();


    }

}
