<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
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

    /**
     * 用户的学校
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function school()
    {
        if($this->hasRole('school'))
        {
            return $this->hasOne('App\Models\School','user_id','id');
        }
    }
}
