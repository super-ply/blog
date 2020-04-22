<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <meta
      http-equiv="X-UA-Compatible"
      content="ie=edge"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Static Template</title>
  </head>
  <body>
        <table>
        <tr>
            <td>ID</td>
            <td>用户名</td>
            <td>密码</td>
            <td>操作</td>
        </tr>
        @foreach($user as $v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->username}}</td>
            <td>{{$v->password}}</td>
            <td><a href='/user/edit/{{$v->id}}'>修改</a>|<a href=''>删除</a></td>
        </tr>
        @endforeach
        <tr>
            <td><input type="submit" value="提交"></td>
        </tr>
        </table>
  </body>
</html>