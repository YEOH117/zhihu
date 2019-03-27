<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use App\Comment;
use App\Reply;

class PostController extends Controller
{
    //文章列表
    public function index(){
        $info=Post::all()->where('del','=',0);
        return view('/Home/index', compact('info'));
    }
    
    //文章创建页
    public function create(){
        return view('/Home/create');
    }
    
    //文章创建逻辑
    public function store(Request $request){
        //获取封面图
        if($request->hasFile('upfile') && $request->file('upfile')->isValid()){
            $file = $request->file('upfile');
            $ext = $file->getClientOriginalExtension();
            $name = date('Y-m-d-h-i-s').rand(0,9).'.'.$ext;
            //保存文件，并获取其路径
            $path = $file->storeAs('public/images', $name);
            $path = str_replace('public','/storage',$path);
            //插入数据
            $post = new Post;
            $post->title = $request->title;
            $post->content = $request->EditText;
            $post->image = $path;
            $post->uid = Auth::id();
            $post->save();
        }
        return redirect('/');
    }
    
    //文章详情页
    public function show($id){
        //查询文章
        $info = Post::find($id);
        //查询评论
        $comment = Post::find($id)->commment;
        foreach ($comment as $value){
            //查询评论的用户名
            $value['name'] = Comment::find($value->id)->user;
            //查询评论中的评论
            $value['reply'] = Comment::find($value->id)->reply;
        }
        return view('/Home/post', compact('info','comment'));
    }

    //文章编辑页
    public function edit($id){
        $info = Post::find($id);
        $this->authorize('update',$info);
        return view('/Home/edit', compact('info'));
    }
    
    //文章编辑逻辑
    public function update(Request $request,$id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->EditText;
        $post->save();
        return redirect("post/$id");
    }
    
    //文章删除
    public function delete($id){
        $post = Post::find($id);
        $this->authorize('delete',$post);
        $post->del = 1;
        $post->save();
        return redirect("/");
    }
}
