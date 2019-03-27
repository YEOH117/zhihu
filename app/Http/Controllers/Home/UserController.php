<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use App\Userdata;

class UserController extends Controller
{
    //用户主页
    public function index(){
        $user = User::find(\Auth::id());
        return view('Home/homepage',compact('user'));
    }
    
    //用户信息编辑页
    public function edit(){
        return view('Home/people_edit');
    }
    
    //封面上传
    public function CoverUpload(Request $request){
        if($request->file('CoverImage')){
            $file = $request->file('CoverImage');
            $ext = $file->getClientOriginalExtension();
            $name = date('Y-m-d-h-i-s').rand(0,9).'.'.$ext;
            //保存文件，并获取其路径
            $path = $file->storeAs('public/cover', $name);
            $path = str_replace('public','/storage',$path);
            $user = new User;
            $user = $user::find(\Auth::id());
            $user->cover = $path;
            $user->save();
        }
    }
    
    //头像上传
    public function AvatarUpload(Request $request){
        if($request->file('UserImage')){
            $file = $request->file('UserImage');
            $ext = $file->getClientOriginalExtension();
            $name = date('Y-m-d-h-i-s').rand(0,9).'.'.$ext;
            //保存文件，并获取其路径
            $path = $file->storeAs('public/avatar', $name);
            $path = str_replace('public','/storage',$path);
            $user = new User;
            $user = $user::find(\Auth::id());
            $user->image = $path;
            $user->save();
        }
    }
    
    //其他信息存储InfoStorage
    public function infostorage(Request $request){
        if($request->all()){
            if(!$user = Userdata::find(\Auth::id())){
                $user = new Userdata;
            }
            $user->user_id = \Auth::id();
            $user->gender = $request->gender;
            $user->introduction = $request->introduction;
            $user->hometown = $request->hometown;
            $user->career = $request->career;
            $user->career_exp = $request->career_exp;
            $user->education_exp = $request->education_exp;
            $user->self_introduction = $request->self_introduction;
            $user->save();
            
            return redirect('/user/home');
        }
        return redirect()->back();
    }
    
    //用户注册页
    public function register(){
        return view('Home/register');
    }
    
    //注册逻辑
    public function enrol(Request $request){
        //验证表单
        $validator = Validator::make($request->all(),[
            'name' => 'max:12|min:1|required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits_between:11,11',
            'password' => 'alpha_num|max:20|min:6|required|confirmed'
        ]);
        if($validator->fails()){
            //失败，重定向上一页，导出错误信息
            return redirect()->back()->withErrors($validator->errors());
        }else{
            //存储用户
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = bcrypt($request->password);
            $user->save();

        }
        return redirect('/');
    }
    
    //用户登陆
    public function login(){
        //用户如果已登录就导回首页
        if (Auth::check())
        {
            return redirect('/');
        }
        return view('Home/login');
    }
    
    //登陆逻辑
    public function loging(Request $request){
        //验证
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);
         if($validator->fails()){
             return redirect()->back()->withErrors('邮箱格式错误！');
         }else{
             //逻辑
             $email = $request->email;
             $password = $request->password;
             if (\Auth::attempt(['email' => $email, 'password' => $password],false)){
                 return redirect('/');
            }else{
                return redirect()->back()->withErrors('邮箱或密码错误！');
            }
         }
    }
    
    //用户注销
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
