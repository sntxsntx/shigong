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

Route::get('/', function () {
    return view('welcome');
});


//呈递注册页面
Route::get('/Home/Registe/index','Home\RegisteController@index');

//验证注册提交的信息
Route::post('/Home/Registe/checkInfo','Home\RegisteController@checkInfo');



//呈递登录页面
Route::get('/Home/Login/index','Home\LoginController@index');

//验证登录提交的信息
Route::post('/Home/Login/checkInfo','Home\LoginController@checkInfo');

//退出
Route::get('/Home/Login/logOut','Home\LoginController@logOut');


//路由组
Route::group(['middleware' => ['checklogin']], function () {
	//呈递后台首页
	Route::get('/Home/Article/index','Home\ArticleController@index');

	//呈递文章列表页
	Route::get('/Home/Article/list','Home\ArticleController@list');

	//呈递文章添加页
	Route::get('/Home/Article/add','Home\ArticleController@add');

	//执行添加文章
	Route::post('/Home/Article/insert','Home\ArticleController@insert');

	//获取具体文章信息
	Route::get('/Home/Article/getSpecific','Home\ArticleController@getSpecific');

	//执行修改文章
	Route::post('/Home/Article/edit','Home\ArticleController@edit');

	//执行删除文章
	Route::get('/Home/Article/delete','Home\ArticleController@delete');

});



