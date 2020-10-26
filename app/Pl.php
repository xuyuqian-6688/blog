<?php


namespace App;
use Illuminate\Database\Eloquent\Model;//继承基类数据库控制器

class Pl extends Model
{
    //
    protected $fillable = [
        'article_id',
        'name',
        'email',
        'site_url',
        'content',
    ];
    public $table="comments";
}