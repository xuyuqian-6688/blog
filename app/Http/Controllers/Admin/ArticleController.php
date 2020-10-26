<?php


namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Cate;

class ArticleController extends Controller
{
    public function show()
    {
        $data=Article::orderBy("id","desc")->paginate(15);
        //dd($model->cateInfo());
        /*$cates=$model->cateInfo();
        if(!$cates){
            return back();
        }*/
        return view("article/show",["data"=>$data]);
    }

    public function add()
    {
        $cates=Cate::orderBy("id","desc")->get();
        //dd($cates);
        return view("article/add",["cates"=>$cates]);
    }

    public function doadd(Request $request)
    {
        /**
         * 验证规则
         */
        $this->validate($request,
            [
            "cate_id"=>"required|integer|exists:cates,id",
            "title"=>"required|min:1|max:255",
            "content"=>"required",
            ],
            [
                "required"=>":attribute 必须填写",
                "min"=>":attribute 长度不符合规范",
                "max"=>":attribute 长度不符合规范",
                "exists"=>":attribute 不存在",
                "integer"=>":attribute 必须为整数"
            ],
            [
                "cate_id"=>"文章分类",
                "title"=>"标题",
                "content"=>"正文"
            ]);

        //获取数据
        $res=$request->only("cate_id","title","content");

        //插入数据
        $data=Article::create($res);
        if($data){
            return redirect("Admin/article/show");
        }else{
            return back()->with("error","添加失败");
        }
        //dd($request->all());
    }

    public function edit($id)
    {
        $cates=Cate::orderBy("id","desc")->get();
        $article=Article::find($id);
        //dd($data);
        return view("article/edit",["cates"=>$cates,"article"=>$article]);
    }

    public function doedit(Request $request,Article $model)
    {
        /**
         * 验证规则
         */
        $this->validate($request,
            [
                "cate_id"=>"required|integer|exists:cates,id",
                "title"=>"required|min:1|max:255",
                "content"=>"required",
            ],
            [
                "required"=>":attribute 必须重新填写",
                "min"=>":attribute 长度不符合规范",
                "max"=>":attribute 长度不符合规范",
                "exists"=>":attribute 不存在",
                "integer"=>":attribute 必须为整数"
            ],
            [
                "cate_id"=>"文章分类",
                "title"=>"标题",
                "content"=>"正文"
            ]);
        //获取数据
        $res=$request->only("id","cate_id","title","content");
        $data=$model->doadds($res);
        if($data){
            return redirect("Admin/article/show");
        }else{
            return back()->with("error","添加失败");
        }


    }

    public function del($id)
    {
        //dd($id  );
        //执行删除
        $res=Article::destroy($id);
        //判断删除结果
        if($res){
            return redirect("Admin/article/show");
        }else{
            return back()->with("error","删除失败！");
        }
    }


}