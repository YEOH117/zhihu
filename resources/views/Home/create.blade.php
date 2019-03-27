<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!--引入jquery-->
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
        
        <!--引入富文本编辑器（wangEditor）-->
        <script src="//unpkg.com/wangeditor/release/wangEditor.min.js"></script>
        <style>
            input{
                margin-bottom:20px;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-default ">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">纸糊</a>
            </div>
             
        </div>
    </nav>
        <div class="container">
            <form action="/post" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <label>封面上传</label>
                <input class="btn btn-default pull-right" type="submit" id="btn1" value="发布"></input>
                <input type="file" name="upfile">
                <input type="hidden" name="EditText" value="" id="txt"></input>
                <input class="form-control" name="title"  placeholder="请输入标题"></input>
<!--使用富文本编辑器-->
                <div id="div1">
                <!--内容输入-->
                </div>
                <script type="text/javascript" src="/wangEditor.min.js"></script>
                <script type="text/javascript">
                    var E = window.wangEditor
                    var editor = new E('#div1')
                    editor.create();
                    document.getElementById('btn1').addEventListener('click', function () {
                        $('#txt').attr('value',editor.txt.html());
                    }, false);
                </script>
            </form>
        </div>
    </body>
</html>