<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    public function zan(){
        return $this->hasMany('App\zan','post_id','id');
    }
    
//    //该用户是否点赞
//    public function isZan($user_id){
//        return $this->hasOne('App\zan','post_id','id')->where('uid',$user_id);
//    }
    
    public function user(){
        return $this->belongsTo('App\user','uid','id');
    }
    
    public function commment(){
        return $this->hasMany('App\comment','post_id','id')->orderBy('created_at','desc');
    }
}
