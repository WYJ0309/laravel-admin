<?php
/**
 *
 * 菜单表
 *
 */
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{

    public $table = 'menus';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'back_front', 'route_name','route_url', 'route_pid','route_sign'
    ];
}
