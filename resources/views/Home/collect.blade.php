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

        <style type="text/css" media="screen">
            .cloumn{
                text-align:center;
                padding:15px 0;
            }
            .right-lower-sidebar li{
                list-style-type:none;
                padding:10px 10px 20px 0px;
            }
            .right-lower-sidebar{
                margin-top:15px;
                background-color:#fff;
            }
            .right-sidebar{
                background-color:#fff;
                text-align:center;
                
            }
            .footer li{
                list-style-type:none;
                margin:5px 0;

            }
            .footer{
                margin-top:15px;
                padding-left:0;
            }
        </style>
    </head>
    <body style="background-color:#E8E8E8">
    <nav class="navbar navbar-default ">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="/">纸糊</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">首页 <span class="sr-only">(current)</span></a></li>
            <li><a href="/Word">打字背单词</a></li>
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
                <li><a href="/">主页</a></li>
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
        <div class=" col-md-12" style="height:250px;background-color:#fff;margin-bottom:10px;padding:0;">
            <img src="{{ $user->image }}" alt="用户头像" class="img-thumbnail pull-left" style="height:168px;width:168px;margin:60px auto auto 30px;">
            <div style="height:50%;background-color:gray;background-image: url( {{ $user->cover }} )">
            </div>
            <div>
                <h2 class="pull-left" style="margin-left:20px;">{{ $user->name }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
    
        <div class="pull-left  col-md-8" style="background-color:#FFF;">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="">收藏的文章</a></li>
            </ul>
            <ul>
            @foreach($post as $value)
            @if(!$value->del)
            <li style="margin-top:20px;">
                <div class='media'>
                    <a href='/post/{{ $value->id }}'><h4 class='media-heading'>{{ $value->title }}</h4></a>
                    <div class='media-left media-middle'>
                        <img class='media-object img-rounded' src='{{ $value->image }}' width='200px' alt='文章缩略图1'>
                    </div>
                    <div class='media-body'>
                        {{ mb_substr(strip_tags($value->content), 0,200)."。。。" }}

                    </div>
                </div>
            </li>
            @endif
            @endforeach
            </ul>
        </div>
        <div class="col-md-4" style="padding-right:0px;">
        <div class="pull-right  col-md-12 right-sidebar">
            <div>
                <div class="pull-left col-md-6 cloumn">
                    <h4>关注了</h4>
                    19
                </div>
                <div class="pull-right col-md-6 cloumn">
                    <h4>关注者</h4>
                    1111
                </div>
            </div>
        </div>
        <div class="pull-right col-md-12 right-lower-sidebar">
            <ul>
                <li>
                    <a class='btn' href="/user/collect">收藏的文章</a>
                </li>
                 <li>
                     <a class='btn'>关注的专栏</a>
                </li>
                 <li>
                     <a class='btn'>关注的问题</a>
                </li>
                <li>
                    <a class='btn'>关注的收藏夹</a>
                </li>
                <li>
                    个人主页被浏览123次
                </li>
            </ul>
        </div>
        <div class="pull-right col-md-12 footer">
            <ul>
                <li>底部预留部分</li>
                <li>联系我们</li>
                <li>&copy;2019叶斌龙</li>
            </ul>
        </div>
    </div>
    </div>
    </div>
    </body>
</html>