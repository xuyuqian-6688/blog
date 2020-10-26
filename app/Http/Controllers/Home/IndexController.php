<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use  App\Pl;

class IndexController extends Controller
{
    //加载首页
    public function show(Request $request)
    {
        //获取搜索内容
        $search=$request->query("search");

        //将model模型保存起来
        $model=Article::orderBy("id","desc");

        //判断是否有搜索的值
        if($search){
            $model->where('title','like','%'.$search.'%');
        }

        //查询文章数据
        $article=$model->paginate(3);

        //dump($search_data);
        //内容展示
        //$article=Article::orderBy("id","desc")->paginate(3);
        return view("home/show",["article"=>$article,"search"=>$search]);
    }

    //文章详情页
    public function detail($id,Article $model)
    {

        //文章查询
        $data=Article::find($id);
        //dd($data);
        if(!$data){
            return redirect("/");
        }
        //dd($model->comment());
        //获取评论
        //$comments = $data->comment();
        //dd($comments);
        return view("home/detail",["data"=>$data]);
    }

    /**
     * 评论的插入
     */
    public function pl(Request $request)
    {
        // 表单验证
        $this->validate($request, [
            'article_id' => 'required|integer|exists:articles,id',
            'name' => 'required|max:25',
            'email' => 'required|max:60|email',
            'site_url' => 'nullable|url',
            'content' => 'required|max:255',
        ], [
            'required' => ':attribute 必须填写',
            'min' => ':attribute 最小为 :min',
            'max' => ':attribute 最大为 :max',
            'exists' => ':attribute 不存在',
            'email' => ':attribute 必须填写邮箱',
            'integer' => ':attribute 必须为整数',
            'url' => ':attribute 必须为url地址'
        ], [
            'article_id' => '文章标识符',
            'name' => '昵称',
            'email' => '邮箱',
            'site_url' => '网站地址',
            'content' => '评论',
        ]);
        $data=$request->only("article_id","name","email","content","site_url","status");
        //dd($data);
    // 操作数据库
        $res = Pl::create($data);
        // 提示信息
        if ($res) {
            return back();
        } else {
            return back()->with('errMsg', '评论失败!');
        }
    }

}