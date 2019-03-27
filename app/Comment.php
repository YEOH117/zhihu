<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function reply(){
        return $this->hasMany('App\reply','comment_id','id')->orderBy('created_at');
    }
    
    public function user(){
        return $this->belongsTo('App\user','from_uid','id');
    }
}
