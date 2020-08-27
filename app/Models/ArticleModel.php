<?php
/**
 *
 * 文章表
 *
 */
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{

    public $table = 'article';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];
}
