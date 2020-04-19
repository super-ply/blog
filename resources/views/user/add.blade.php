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
        <form action="/user/store" method="post" class="login-form">
          <table>
            <tr>
                {{csrf_field()}}
                <td>用户名</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="提交"></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </body>
</html>