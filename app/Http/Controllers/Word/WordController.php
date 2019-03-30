<?php

namespace App\Http\Controllers\Word;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Word;
use App\Userword;

class WordController extends Controller
{
    //
    public function index(){
        return view('/Word/word');
    }
    //更新单词
    public function upd($id){
        if(\Auth::id()){
            if($id == 0){
                $id = Userword::where('user_id',\Auth::id())->select('word_id')->first();
                if($id == null){
                    $id = 0;
                    $word = Word::offset($id)->limit(10)->get();
                }else{
                    $word = Word::offset($id->word_id)->limit(10)->get();
                }
                
            }else{
                $word = Word::offset($id)->limit(10)->get();
            }
            $json = json_encode(compact('word'));
            return $json;
        }else{
            
        }
    }
    //更新用户打字进度
    public function updid($id){
        if(\Auth::id()){
            
        }
    }
    
}
