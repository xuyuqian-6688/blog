<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //加载视图
    public function show()
    {
        return view("login");
    }

    //处理登陆
    public function login(Request $request,User $model)
    {
        /**
         * 打印请求
         *      $request->all()     获取所有数据
         *      $request->input()       获取指定数据
         *      $request->名字      获取指定数据
         */
        $res=$request->only("username","password"); //只获取用户名和密码
        //检测用户是否存在
        $data=$model->where("name",$res["username"])->first();
        //dd($res["password"]);
        if(! $data){
            return back()->with("error","用户名不存在")->withInput();
        }
        //dd($data->password);
        //验证密码
        if (! password_verify($res["password"],$data->password)){
            return back()->with("error","密码错误")->withInput();
        };

        /**
         * session操作
         *      1、注册
         *          $request->session()->put('key', 'value');
         *          再不覆盖原来注册的key的情况下，保存索引数组
         *          $request->session()->push('user.teams', 'developers');
         *      2、获取
         *          $request->session()->get('key');  获取指定key
         *          $request->session()->all();     获取所有
         *      3、删除
         *          $request->session()->forget('key');     删除指定的key
         *          $request->session()->flush();       删除所有的session
         */

        //login保存session
        $request->session()->put("login",true);
        $request->session()->put("userInfo",[
            "id"=>$data->id,
            "username"=>$data->name,
        ]);

        //返回index页面
        return redirect("Admin/index");

    }
}