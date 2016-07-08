<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/7/8
 * Time: 14:28
 */

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;

class FamilyController extends HomeController
{
    /**
     * 初始化
     * FamilyController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public function index()
    {

    }
}