<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view("admin/admin");
    }

    //退出登录
    public function logout()
    {
        session([
           "login"=>false,
           "userInfo" =>null,
        ]);
        return redirect("login")->with("error","退出成功!");
    }

    //修改用户信息
    public function userEdit()
    {

    }
}