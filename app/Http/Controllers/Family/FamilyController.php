<?php

/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/12
 * Time: 16:26
 */
namespace App\Http\Controllers\Family;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);

        $request->session()->put('identity','parents');
    }
}