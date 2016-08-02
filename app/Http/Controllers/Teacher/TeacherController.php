<?php

/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 18:58
 */
namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController  extends Controller
{
    protected $user;

    public function __construct(Request $request)
    {
        parent::__construct($request);

        $request->session()->put('identity','teacher');
        
        $this->user = $request->user();
    }
}