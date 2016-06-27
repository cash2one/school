<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthUser;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends AuthUser
{
    use EntrustUserTrait;
    
    protected $dateFormat = 'U';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 当前用户所有操作日志
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Logs()
    {
        return $this->hasMany('App\Models\Log','user_id','id');
    }
}
