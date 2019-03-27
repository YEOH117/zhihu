<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $table = 'replys';
    
    public function UserFromName(){
        return $this->hasOne('App\user','id','from_uid');
    }
    
    public function UserToName(){
        return $this->hasOne('App\user','id','to_uid');
    }
}
