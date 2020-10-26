<?php


namespace App;
use Illuminate\Database\Eloquent\Model;//继承基类数据库控制器

class Cate extends Model
{
    public $table="cates";
    protected $fillable=["name"];

    //处理修改
    public function doedit($aa)
    {
        /*//dd($aa);
        $this->find($aa["id"]);
        $this->name=$aa["name"];
        return $this->save();*/
        //获取id
        $pk=$this->primaryKey;
        //根据id查找数据
        $model=$this->find($aa[$pk]);
        //附上新的值
        $model->fill($aa);
        //保存，再返回
        return $model->save();
    }

    //一对多
    public function articlea()
    {
        return $this->hasMany("App\Article","cate_id","id");
    }
}