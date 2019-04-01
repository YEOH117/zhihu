<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--引入jquery-->
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
        <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <!--引入word.js-->
        <script type="text/javascript" src="js/word.js"></script>
        <style>
            h1{
                text-align: center;
            }
            h3{
                text-align: center;
                color:#8BAA4A;
            }
            .blue{
                color:  #87CEEB;
            }
            .red{
                color: red;
            }
            body{
                background-image:url(storage/20180818.jpg);
            }
            .left-sidebar{
                background:rgba(0,0,0,0.3);
                color:#eeef;
                padding:20px;
                height:400px
            }
            .right-sidebar ul{
                background:rgba(0,0,0,0.3);
                color:#eeef;
                padding:10px 20px;
            }
            .right-sidebar li{
                list-style-type:none;
                padding:10px 20px;
            }
        </style>
         
    </head>
    <body >
    <nav class="navbar navbar-default ">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="/">纸糊</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li ><a href="/">首页 <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="/Word">打字背单词</a></li>
            <li><a href="#">话题</a></li>
          </ul>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">提问</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                @auth
                    {{\Auth::user()->name}}
                @endauth
                @guest
                    你尚未登录
                @endguest
                  <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="/user/home">主页</a></li>
                <li><a href="#">设置</a></li>
                <li role="separator" class="divider"></li>
                <li>
                    @if(Auth::check())
                        <a href="/logout">退出</a>
                    @else
                        <a href="/login">登陆</a>
                    @endif
                </li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
      </div>
    </nav>
    <div class="container" >
        <div class="row">
        <div class="col-md-8 left-sidebar" style="">
            @auth
            <div class="row">
                <h1 id="danci">controller</h1>
            </div>
            <div class="row">
                <h3 class="transl">controller</h3>
            </div>
            <div class="adio"></div>
            <div class="row">
                <input id="word" style="width:60%;margin-left:20%;margin-right:20%" class="form-control" onkeyup="keyup('controller')">
            </div>
            @endauth
            @guest
            <div class="row">
                <h1 id="danci">hello</h1>
            </div>
            <div class="row">
                <h3 class="transl">你好</h3>
            </div>
            <div class="adio"></div>
            <div class="row">
                <input id="word" style="width:60%;margin-left:20%;margin-right:20%" class="form-control" onkeyup="keyup('hello')">
            </div>
            @endguest
           
        </div>
        <div class="col-md-4 right-sidebar">
            <ul>
                <li id="num">
                    本次已经打了0个字
                </li>
                <li>
                    正确：111
                </li>
                <li>
                    错误：1
                </li>
            </ul>
        </div>
        </div>
    </div>
    </body>
</html>