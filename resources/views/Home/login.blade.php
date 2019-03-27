<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <!--引入jQuery-->
        <script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
        <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    </head>
    <body >

        <!--导航栏-->
        <nav class='navbar navbar-default navbar-static-top'>
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">纸糊</a>
                </div>
               
            </div>
        </nav>
        <div class="container">
            <div class="col-md-4">
            <form action="/loging" method="post" accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">邮箱Email</label>
                    <input type="email" class="form-control"name="email" placeholder="请输入邮箱">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">密码</label>
                    <input type="password" class="form-control" name="password" placeholder="请输入密码">
                </div>
                <div style="margin-top:20px ">
                    <button class="btn btn-default" type="submit">登陆</button>
                </div>
            </form>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <p><a href="/register">还没有账号？点此注册！</a></p>
            </div>
        </div>
    </body>
</html>