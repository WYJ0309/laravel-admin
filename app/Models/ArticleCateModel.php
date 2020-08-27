<?php
/**
 *
 * 文章分类表
 *
 */
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ArticleCateModel extends Model
{

    public $table = 'article_cate';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pid', 'cate_name'
    ];
}
