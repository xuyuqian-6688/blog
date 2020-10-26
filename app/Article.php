<?php


namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;//继承基类数据库控制器

class Article extends Model
{
    public $table="articles";
    protected $fillable=["cate_id","title","content"];

    //获取文章的分类
    public function cateInfo()
    {
        //$cate=Cate::find($this->cate_id);
        //return $cate;
        return $this->hasOne("App\Cate","id","cate_id");
        //return DB::table("cates")->leftjoin("articles","cates.id","=","articles.cate_id")->get();
    }

    //修改操作
    public function doadds($aa)
    {
        //获取id
        $pk=$this->primaryKey;
        //根据id查找数据
        $model=$this->find($aa[$pk]);
        //附上新的值
        $model->fill($aa);
        //保存，再返回
        return $model->save();
    }

    //获取前台的摘要
    public function getRemark($len=100)
    {
        $content=mb_substr(strip_tags($this->content),0,$len);
        return $content;
    }


    public function comment()
    {
        return $this->hasMany('App\Pl', 'article_id', 'id')->orderBy('id', 'desc')->where('status', 1)->get();
        //return DB::table("comments")->leftJoin("articles","articles.id","=","comments.article_id")->get();
    }

}