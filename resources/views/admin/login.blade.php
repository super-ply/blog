<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>后台登录管理系统</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{asset('x-admin/css/font.css')}}">
    <link rel="stylesheet" href="{{asset('x-admin/css/login.css')}}">
	  <link rel="stylesheet" href="{{asset('x-admin/css/xadmin.css')}}">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset('X-admin/lib/layui/layui.js')}}" charset="utf-8"></script>
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">后台管理登录</div>
        @if (count((array)$errors) > 0)
          <div class="alert alert-danger">
            <ul>
                @if(is_object($errors))
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                @else
                  <li>{{$errors}}</li>
                @endif
            </ul>
          </div>
        @endif

        <div id="darkbannerwrap"></div>
        
        <form method="post" class="layui-form" action="{{url('admin/dologin')}}">
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input name="verifycode" style='width:150px;float:left' lay-verify="required" placeholder="请输入验证码"  type="text" class="layui-input">
            <img src="{{url('/admin/create')}}" alt="" style="width:150px;float:right;height:50px" id="img">
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    <!-- <script>
        $(function  () {
            layui.use('form', function(){
              var form = layui.form;
              // layer.msg('玩命卖萌中', function(){
              //   //关闭后的操作
              //   });
              //监听提交
              form.on('submit(login)', function(data){
                // alert(888)
                layer.msg(JSON.stringify(data.field),function(){
                    //location.href='index.html'
                });
                return false;
              });
            });
        })
    </script> -->
  
    <script>
    $("#img").click(function(){
                $(this).attr('src',"{{url('/admin/create')}}"+"?"+Math.random())
            })
    </script>
    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html>