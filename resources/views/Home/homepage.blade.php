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
                padding:10px 20px;
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
            <li><a href="#">发现</a></li>
            <li><a href="#">话题</a></li>
          </ul>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">提问</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">站内信</a></li>
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
                <li><a href="#">主页</a></li>
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
                <a class="btn btn-default pull-right" href="/user/edit/{{ \Auth::id() }}">编辑用户资料</a>
            </div>
        </div>
    </div>
    <div class="row">
    
        <div class="pull-left  col-md-8" style="background-color:#FFF;">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="#">动态</a></li>
                <li role="presentation"><a href="#">文章</a></li>
            </ul>
            <ul>
            @foreach($user->post as $post)
                <li style="margin-top:20px;">
                    <div class='media'>
                        <div class="pull-right">{{ $post->created_at }}</div>
                        <a href='./post/{{ $post->id }}'><h4 class='media-heading'>{{ $post->title }}</h4></a>
                        <div class='media-left media-middle'>
                            <img class='media-object img-rounded' src='{{ $post->image }}' width='200px' alt='文章缩略图1'>
                        </div>
                        <div class='media-body'>
                            {{ strip_tags($post->content) }}
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
    <div style="padding-left:35px;">
        <div class="pull-right  col-md-4 right-sidebar">
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
        <div class="pull-right col-md-4 right-lower-sidebar">
            <ul>
                <li>
                    关注的话题<span class="pull-right">1</span>
                </li>
                 <li>
                    关注的专栏<span class="pull-right">2</span>
                </li>
                 <li>
                    关注的问题<span class="pull-right">3</span>
                </li>
                <li>
                    关注的收藏夹<span class="pull-right">4</span>
                </li>
                <li>
                    个人主页被浏览123次
                </li>
            </ul>
        </div>
        <div class="pull-right col-md-4 footer">
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