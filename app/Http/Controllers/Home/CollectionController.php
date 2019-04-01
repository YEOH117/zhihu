<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Collection;

class CollectionController extends Controller
{
    //
    public function collection($post_id){
        $collection = new Collection;
        //判断是否已经收藏过了
        if($info = $collection->where('post_id',$post_id)->where('user_id',\Auth::id())->first()){
            //取消收藏
            $info->delete();
            //返回json
            $json = json_encode (['text'=>'收藏']);
            return $json;
        }else{
            //收藏
            $collection->post_id = $post_id;
            $collection->user_id = \Auth::id();
            $collection->save();
            //返回json
            $json = json_encode (['text'=>'取消收藏']);
            return $json;
        }
    }
}
