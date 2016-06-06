<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/6/6
 * Time: 14:28
 */

namespace App\Models;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $table = 'roles';
}