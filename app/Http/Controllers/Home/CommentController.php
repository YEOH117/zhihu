<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use App\Reply;

class CommentController extends Controller
{
    //评论逻辑
    public function comment(Request $request){
        if($request->reply_type == 'post'){
            $comment = new Comment;
            $comment->post_id = $request->post_id;
            $comment->content = $request->content;
            $comment->from_uid = $request->from_uid;
            $comment->save();
        }else{
            $comment = new Reply;
            $comment->comment_id = $request->comment_id;
            $comment->reply_id = $request->reply_id;
            $comment->reply_type = $request->reply_type;
            $comment->content = $request->content;
            $comment->from_uid = $request->from_uid;
            $comment->to_uid = $request->to_uid;
            $comment->save();
        }
        return redirect()->back();
    }
    
}
