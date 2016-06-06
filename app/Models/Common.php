<?php
/**
 * 公共模型
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Common extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $dateFormat = 'U';
}