<?php

namespace App\Http\Controllers\Word;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WordController extends Controller
{
    //
    public function index(){
        return view('/Word/word');
    }
}
