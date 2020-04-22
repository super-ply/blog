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
    <div class="container">
        <form action="/user/update" method="post" class="login-form">
          <table>
            <tr>
                {{csrf_field()}}
                <input type='hidden' name="id" value="{{$user->id}}">
                <td>用户名</td>
                <td><input type="text" name="username" value='{{$user->username}}'></td>
            </tr>
            <tr>
                <td><input type="submit" value="修改"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </body>
</html>