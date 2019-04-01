<?php

namespace App;
use App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
    protected $fillable = [
        'name','image','email','phone','password','id'
    ];
    
    public function post(){
        return $this->hasMany('App\post','uid','id');
    }
    
    public function collection(){
        return $this->hasMany('App\collection','user_id','id');
    }
}
