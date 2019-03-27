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
            .data-column li{
                list-style-type:none;
                padding:20px 0;
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
        <div class=" col-md-12" style="background-color:#fff;padding:0;">
            <span class="btn btn-default  pull-left userimage" style="height:168px;width:168px;margin:60px auto auto 30px;">
                <div style="line-height:168px;">头像设置</div>
            </span>
            <form   id="AvatarForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" id="UserImage" name="UserImage" style="opacity: 0;" >
            </form>
            <script>
                $(".userimage").click(function(){
                    $("#UserImage").click();
                })
                $("#UserImage").change(function(){
                    $.ajax({
                        url: '/AvatarUpload',
                        type: 'POST',
                        cache: false,
                        data: new FormData($('#AvatarForm')[0]),
                        processData: false,  
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    alert('头像上传成功');
                });
            </script>
            <div style="height:175px;background-color:gray;">
                <form   id="CoverForm" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" id="CoverImage" name="CoverImage" style="opacity: 0;" >
                </form>
                <button type="submit" id="coverimage" class="btn btn-default pull-right">上传封面图片</button>
            </div>
            <script>
                $("#coverimage").click(function(){
                    $("#CoverImage").click();
                })
                $("#CoverImage").change(function(){
                    $.ajax({
                        url: '/CoverUpload',
                        type: 'POST',
                        cache: false,
                        data: new FormData($('#CoverForm')[0]),
                        processData: false,  
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    alert("封面上传成功");
                });
            </script>
            <div>
                <h2 class="pull-left" style="margin-left:20px;">用户名</h2>
                <a class="btn pull-right" href="/user/home">返回我的主页 ></a>
            </div>
        </div>
        <div class="col-md-12" style="background-color:#fff;padding-bottom:50px">
            <form  action="/infostorage" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <ul class="data-column col-md-8 col-md-offset-2">
                    <li>
                        <h4><b>性别</b></h4>
                        <input class="form-control" type="text" name="gender"/>
                    </li>
                    <li>
                        <h4><b>一句话介绍自己</b></h4>
                        <input class="form-control" type="text" name="introduction" />
                    </li>
                    <li>
                        <h4><b>居住地</b></h4>
                        <input class="form-control" type="text" name="hometown" />
                    </li>
                    <li>
                        <h4><b>所在行业</b></h4>
                        <input class="form-control" type="text" name="career" />
                    </li>
                    <li>
                        <h4><b>职业经历</b></h4>
                        <input class="form-control" type="text" name="career_exp" />
                    </li>
                    <li>
                        <h4><b>教育经历</b></h4>
                        <input class="form-control" type="text" name="education_exp" />
                    </li>
                    <li>
                        <h4><b>个人简介</b></h4>
                        <input class="form-control" type="text" name="self_introduction" />
                    </li>
                </ul>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-default col-md-2 col-md-offset-5">保存</button>
                </div>
            </form>
            
        </div>
    </div>
    </div>
    </body>
</html>