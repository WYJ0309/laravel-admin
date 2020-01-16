<?php
/**
 *
 * 系统配置表
 *
 */
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SysConfigModel extends Model
{

    public $table = 'sys_config';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'type_name','sys_val'
    ];
}
