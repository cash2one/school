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

    /**
     * 用户负责的年级
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function grade()
    {
        if($this->hasRole('grades'))
        {
            return $this->hasOne('App\Models\Grade','user_id','id');
        }
    }

    /**
     * 用户负责的班级
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function classes()
    {
        if($this->hasRole('director'))
        {
            return $this->hasOne('App\Models\Classes','user_id','id');
        }
    }

    /**
     * 用户教师
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teacher()
    {
        if($this->hasRole('teacher'))
        {
            return $this->hasOne('App\Models\Teacher','user_id','id');
        }
    }

    /**
     * 绑定家庭
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function family()
    {
        if($this->hasRole('parents'))
        {
            return $this->hasOne('App\Models\Parents','user_id','id');
        }
    }

    /**
     * 用户消息
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getMessages()
    {
        return $this->hasMany('App\Models\Message','to_user_id','id');
    }

    /**
     * 未读消息数量
     * @return mixed
     */
    public function getUnReadMessage()
    {
        return $this->hasMany('App\Models\Message','to_user_id','id')->where('looked_at',0);
    }

    /**
     * 发送的消息
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postMessages()
    {
        return $this->hasMany('App\Models\Message','user_id','id');
    }
}
