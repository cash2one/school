<?php

/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 16:26
 */
namespace App\Http\Controllers\Family;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    protected $user;

    public function __construct(Request $request)
    {
        $this->user = $request->user();
    }
}