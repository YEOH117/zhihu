<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Zan;
use App\Post;

class ZanController extends Controller
{
    //
    
    
    public function zan($post_id,$uid){
        
        
        $zan = new Zan;
        if($info = $zan->where('post_id',$post_id)->where('uid',$uid)->first()){
            //取消赞
            $info->delete();
            //查询文章赞数
            $zans = Post::find($post_id)->zan->count();
            //返回json
            $json = json_encode (['text'=>'赞同','zans'=>$zans]);
            return $json;
        }else{
            //赞
            $zan->post_id = $post_id;
            $zan->uid = $uid;
            $zan->save();
            //查询文章赞数
            $zans = Post::find($post_id)->zan->count();
            //返回json
            $json = json_encode (['text'=>'取消赞同','zans'=>$zans]);
            return $json;
        }
        
    }
    
    public function zans($post_id){
        $num = Post::find($post_id)->zan->count();
        return "赞同".$num;
    }

}
