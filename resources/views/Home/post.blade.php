<!DOCTYPE html>
<html lang="zh-CN">
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
            .add-column li{
                list-style-type:none;
                float:left;
                padding-right:20px ;
            }
            li{
                list-style-type:none;
            }
        </style>
        <script>
   
        </script>
    </head>
    <body>
        <nav class="navbar navbar-default ">
            <div class="container">
                <div class="navbar-header">
                  <a class="navbar-brand" href="/">
                    <img alt="Brand" src="#">
                  </a>
                </div>
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="./create">写文章</a></li>
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
                            <li><a href="#">草稿</a></li>
                            <li><a href="#">我的文章</a></li>
                            @guest
                            <li role="separator" class="divider"></li>
                            <li><a href="/login">登陆</a></li>
                            @endguest
                          </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <div class ="row">
                <div class="col-md-12">
                    <img src="{{ $info->image }}" alt="文章配图" style="width:50%;height: auto;">
                </div>
                <!--中间用户文章数据-->
                <div class="col-md-12">
                    <h2>{{ $info->title }}</h2>
                    <h4>{{ $info->user->name }}</h4>
                    {!! $info->content !!}
                    <span>发布于{{ $info->created_at }}</span>
                </div>
            </div>
            <div class="row">
                <ul class="add-column col-md-12">
                    <li>
                        @if($info->zan->where('uid',\Auth::id())->isNotEmpty())
                        <a class="btn btn-info zan" >
                        <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
                        <span class='zantext'>取消赞同</span>
                        </a>
                        @else
                        <a class="btn btn-info zan" >
                        <span class="glyphicon glyphicon-triangle-top" aria-hidden="true"></span>
                        <span class='zantext'>赞同</span>
                        </a>
                        @endif
                    </li>
                    <script>
                        $(".zan").click(function(){
                           $.get("/zan/{{ $info->id }}/{{\Auth::id()}}",function(data){
                               var info = JSON.parse(data);
                               $(".zantext").text(info.text);
                           });
                        });
                    </script>
                    <li>
                        <a class="btn comment_btn">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>添加评论
                        </a>
                    </li>
                    <li>
                        <a class="btn">
                        <span class="glyphicon glyphicon-send" aria-hidden="true"></span>分享
                        </a>
                    </li>
                    <li>
                        <a class="btn">
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>收藏
                        </a>
                    </li>
                    <li class="dropdown">
                        @can('delete',$info)
                        <div class=" dropdown-toggle"data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <a class="btn">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            设置
                            </a>
                        </div>
                        <ul class="dropdown-menu">
                            @can('update',$info)
                            <!-- 当前用户可以更新文章 -->
                            <li><a href="/post/{{ $info->id }}/edit">修改文章</a></li>

                            @endcan
                            <li><a href="/post/{{ $info->id }}/delete">删除</a></li>
                          </ul>
                        @endcan
                    </li>
                    <li>
                        <a class="btn">
                        <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>投稿
                        </a>
                    </li>
                </ul>
            </div>
            <div class="row">
                @auth
                <form action="/comment" method="post" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="input-group col-md-10 comment" style="display: none;">
                        <input type='hidden' name='post_id' value="{{ $info->id }}">
                        <input type='hidden' name='from_uid' value="{{\Auth::user()->id}}">
                        <input type='hidden' name='reply_type' value="post">
                        <input type="text" class="form-control" name='content' placeholder="写下你的评论..." aria-describedby="sizing-addon2">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">发送</button>
                        </span>
                    </div>
                </form>
                <script>
                    $(".comment_btn").click(function(){
                       $(".comment").toggle(); 
                    });
                </script>
                @endauth
                @guest
                <script>
                    $(".comment_btn").click(function(){
                       alert('请先登录！');
                    });
                </script>
                @endguest
            </div>
            <div class="row">
                <!--文章评论-->
                @foreach($comment as $value)
                <ul>
                    <li class="col-md-8">
                        <p><label>{{ $value->name->name }} :</label></p>
                        {{ $value->content }}
                        <a class="btn col-md-1 col-md-offset-11" id='{{ $value->id }}a'>回复</a>
                        @auth
                        <form action="/comment" method="post" enctype="multipart/form-data">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="input-group col-md-10 {{ $value->id }}a" style="display: none;">
                                <input type='hidden' name='to_uid' value="{{ $value->from_uid }}">
                                <input type='hidden' name='from_uid' value="{{\Auth::user()->id}}">
                                <input type='hidden' name='comment_id' value="{{ $value->id }}">
                                <input type='hidden' name='reply_id' value="{{ $value->id }}">
                                <input type='hidden' name='reply_type' value="comment">
                                <input type="text" class="form-control" name='content' placeholder="写下你的评论..." aria-describedby="sizing-addon2">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">发送</button>
                                </span>
                            </div>
                        </form>
                        <script>
                            $("#{{ $value->id }}a").click(function(){
                                $(".{{ $value->id }}a").toggle();
                            });
                        </script>
                        @endauth
                        @guest
                        <script>
                            $("#{{ $value->id }}a").click(function(){
                               alert('请先登录！');
                            });
                        </script>
                        @endguest
                        <ul class="col-md-12">
                            @foreach($value->reply as $reply)
                            <li>
                                <p>
                                    <b>{{ \App\Reply::find($reply->id)->UserFromName->name}}</b>
                                    <font style="color:#8590A6;">回复</font> 
                                    <b>{{ \App\Reply::find($reply->id)->UserToName->name}}</b>
                                </p>
                                {{ $reply->content }}
                                <a class="btn col-md-1 col-md-offset-11" id='a{{ $reply->id }}'>回复</a>
                                @auth
                                <form action="/comment" method="post" enctype="multipart/form-data">
                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}
                                    <div class="input-group col-md-10 a{{ $reply->id }}" style="display: none;">
                                        <input type='hidden' name='to_uid' value="{{ $reply->from_uid }}">
                                        <input type='hidden' name='from_uid' value="{{\Auth::user()->id}}">
                                        <input type='hidden' name='comment_id' value="{{ $value->id }}">
                                        <input type='hidden' name='reply_id' value="{{ $reply->id }}">
                                        <input type='hidden' name='reply_type' value="reply">
                                        <input type="text" class="form-control" name='content' placeholder="写下你的评论..." aria-describedby="sizing-addon2">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">发送</button>
                                        </span>
                                    </div>
                                </form>
                                <script>
                                    $("#a{{ $reply->id }}").click(function(){
                                        $(".a{{ $reply->id }}").toggle();
                                    });
                                </script>
                                @endauth
                                @guest
                                <script>
                                    $("#a{{ $reply->id }}").click(function(){
                                       alert('请先登录！');
                                    });
                                </script>
                                @endguest
                            </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </body>
</html>