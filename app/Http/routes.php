<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/xiangqing', 'homeController@xiangqing');
// //登陆
// Route::get('/login','LoginController@login');
// Route::post('/login','LoginController@dologin');
//注册
// Route::get('/zhuce', 'Auth\AuthController@getRegister');
// Route::post('/zhuce', 'Auth\AuthController@postRegister');

//登陆
Route::get('login','LoginController@login')->name('login');
Route::post('doLogin','LoginController@doLogin');

//注册
Route::get('register','RegisterController@register')->name('register');
Route::post('doRegister','RegisterController@doRegister');

// 用户列表增删改查
Route::any('admin/user','admin\UserController@index');
Route::any('admin/user/update/{id}','admin\UserController@update');
Route::post('admin/user/doUpdate','admin\UserController@doUpdate');
Route::any('admin/user/delete','admin\UserController@delete')->name('delete');

// 文件上传
Route::get('form',function(){
	return view('home.form');
});
Route::post('form','FormController@form');
Route::get('imgList',function(){
	$form = new App\form();
	$img = $form->all();
	// dd($img[0]->img);
	return view('home.imgList',['img'=>$img]);
});
Route::get('avatar/upload','UserController@avatar');
Route::post('avatar/upload','UserController@avatarUpload');


//商品图片添加
Route::get('/shangpin', 'tianjiaController@shangpin');
//商品图片显示
Route::post('/shangpin', 'tianjiaController@xianshi');
Route::get('/shangpinxiangqing', 'tianjiaController@shangpinxiangqing');
//文章列表显示
Route::resource('articles', 'ArticlesController');
Route::post('/markdown','ArticlesController@markdown');
//无限极分类
Route::controller('class', 'ClassController');
//购物车
Route::controller('/fenlei','WuxianController');

//首页
Route::get('ind', 'AlbumsController@index')->name('home');
//相册资源路由
Route::resource('albums','AlbumsController');

//相片资源路由
Route::resource('photos','PhotosController');