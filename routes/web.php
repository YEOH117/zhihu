<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//文章列表(首页)
Route::get('/','Home\PostController@index');

//文章创建页
Route::get('/post/create','Home\PostController@create');
//文章创建逻辑
Route::post('/post','Home\PostController@store');

//文章详情页
Route::get('/post/{id}','Home\PostController@show');

//文章编辑页
Route::get('/post/{id}/edit','Home\PostController@edit');
Route::put('/post/edit/{id}','Home\PostController@update');

//文章删除
Route::get('/post/{id}/delete','Home\PostController@delete');

//用户注册页
Route::get('/register','Home\UserController@register');
//注册逻辑
Route::post('/enrol','Home\UserController@enrol');

//用户登陆
Route::get('/login','Home\UserController@login');
//登陆逻辑
Route::post('/loging','Home\UserController@loging');

//用户注销
Route::get('/logout','Home\UserController@logout');

//用户评论文章逻辑
Route::put('/comment','Home\CommentController@comment');

//用户赞文章
Route::get('/zan/{post_id}/{uid}','Home\ZanController@zan');

//用户主页
Route::get('/user/home','Home\UserController@index');

//用户信息编辑页
Route::get('/user/edit/{id}','Home\UserController@edit');
//头像上传
Route::post('/AvatarUpload','Home\UserController@AvatarUpload');
//封面上传
Route::post('/CoverUpload','Home\UserController@CoverUpload');
//其他信息存储
Route::post('/infostorage','Home\UserController@infostorage');


/**
 * 打字背单词
 */
//打字背单词页面
Route::get('/Word','Word\WordController@index');