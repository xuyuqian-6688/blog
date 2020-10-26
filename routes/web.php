<?php

use Illuminate\Support\Facades\Route;

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
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get("/","Home\IndexController@show");
Route::any("detail/{id}","Home\IndexController@detail");

/**
 * 评论前台
 */
Route::any("pl","Home\IndexController@pl");


/**
 * login路由
 */
Route::get("login","LoginController@show");
Route::post("login","LoginController@login");



/**
 * Route::any("test10",function(){
     *
     * password_hash(明文密码，加密密码)    加密密码
     * password_verify()    验证密码是否一致
     *      同样的文明密码每次加密以后得值都不一样，而且密码不能被解密
     *
    $pass=password_hash(123456,PASSWORD_DEFAULT);
    echo $pass;

    $res=password_verify(123456,$pass);
    dump($res);
    });
 *
 */
Route::any("test10",function(){
    $pass=password_hash(123456,PASSWORD_DEFAULT);
    echo $pass;

    $res=password_verify(123456,$pass);
    dump($res);
});
Route::group([
    "prefix"=>"Admin",
    "middleware"=>["verify_login"],
],function(){
    /**
     * 首页index路由
     */
    //使用中间件，以后需要访问权限的则需要在后面加上中间件规则
    Route::get("index","Admin\IndexController@index");
    //退出登录路由
    Route::any("logout","Admin\IndexController@logout");

    /**
     * 分类列表
     */
    Route::get("cate/show","Admin\CateController@show");
    Route::get("cate/add","Admin\CateController@add");
    Route::post("cate/doadd","Admin\CateController@doadd");
    Route::get("cate/edit/{id}","Admin\CateController@edit")->where("id","\d+");
    Route::post("cate/doedit","Admin\CateController@doedit");
    Route::get("cate/del/{id}","Admin\CateController@del")->where("id","\d+");

    /**
     * 文章列表
     */
    Route::get("article/show","Admin\ArticleController@show");
    Route::get("article/add","Admin\ArticleController@add");
    Route::post("article/doadd","Admin\ArticleController@doadd");
    Route::get("article/edit/{id}","Admin\ArticleController@edit")->where("id","\d+");
    Route::post("article/doedit","Admin\ArticleController@doedit");
    Route::get("article/del/{id}","Admin\ArticleController@del")->where("id","\d+");

    /**
     * 评论管理
     */
    Route::get("pl/show","Admin\PlController@show");
    Route::get("pl/agree/{id}", 'Admin\PlController@agree');
    Route::get("pl/del/{id}", 'Admin\PlController@del');
});