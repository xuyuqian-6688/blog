<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cate;

class CateController extends Controller
{
    public function show()
    {
        $data=Cate::orderBy("id","desc")->get();
        return view("cate/show",["data"=>$data]);
    }

    public function add()
    {
        return view("cate/add");
    }

    public function doadd(Request $request)
    {
        //获取数据
        $res=$request->only("name");
        //使用验证器进行验证值是否合法
        $this->validate($request,
            [
                "name"=>"required|min:1|max:25|unique:cates"
            ],
            [
                "required"=>"列表名不能为空",
                "min"=>"列表名长度必须大于1位",
                "max"=>"列表名长度必须小于25位",
                "unique"=>"列表名不能重复",
            ]
        );

        //插入数据
        $data=Cate::create($res);
        //dd($data);
        //判断是否插入成功
        if($data){
           return redirect("Admin/cate/show");
        }else{
            return back()->with("error","添加失败");
        }
    }

    public function edit($id)
    {
        $data=Cate::find($id);
//        dd($data);
        return view("cate/edit",["data"=>$data]);
    }

    public function doedit(Request $request,Cate $model)
    {
        //验证数据
        //使用验证器进行验证值是否合法
        $this->validate($request,
            [
                "name"=>"required|min:1|max:25|unique:cates"
            ],
            [
                "required"=>"列表名不能为空",
                "min"=>"列表名长度必须大于1位",
                "max"=>"列表名长度必须小于25位",
                "unique"=>"列表名不能重复",
            ]
        );
        //调用模型方法
        $aa=$request->only("id","name");
        $res=$model->doedit($aa);
        if($res){
            return redirect("Admin/cate/show");
        }else{
            return back()->with("error","修改失败");
        }
    }

    public function del($id)
    {
        //判断一下分类下是否有文章
        $cate=Cate::find($id);
        if(! $cate){
             return back();
        }
        if($cate->articlea()->count()>0){
            return back()->with("error","分类下有文章，不能删除");
        }
        if($cate->delete()){
            return redirect("Admin/cate/show");
        }else{
            return back()->with("error","删除失败！");
        }

        /*//执行删除
        $res=Cate::destroy($id);
        //判断删除结果
        if($res){
            return redirect("Admin/cate/show");
        }else{
            return back()->with("error","删除失败！");
        }*/
    }
}