<?php
/**
 *
 * 后端用户表
 *
 */
namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminUser extends Authenticatable
{

    public $table = 'admin_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //remember_token 字段用于记住我的功能
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
