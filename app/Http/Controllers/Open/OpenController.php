<?php

/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/8/3
 * Time: 9:30
 */
namespace App\Http\Controllers\Open;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class OpenController extends BaseController
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}