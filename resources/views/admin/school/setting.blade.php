<?php
/**
 * Created by PhpStorm.
 * User: dyyho
 * Date: 2016/8/6
 * Time: 11:08
 */@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <h3 class="header-text">学校设置
        <span class="hed_te_span"><a href="{{ url('/admin/school') }}">管理</a></span></h3>
    <!--当前位置 end-->
    <div class="smart-widget">
        <div class="smart-widget-inner">
            <div class="smart-widget-body">
                <form class="form-horizontal no-margin form-border" id="school_add" method="post" action="{{ url('/admin/school/add') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="control-label col-lg-2">学校名称：</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->

                    <div class="text-center m-top-md">
                        <button type="submit" class="btn btn-info btn-block">提交</button>
                    </div>
                </form>
            </div>
        </div><!-- ./smart-widget-inner -->
    </div><!-- ./smart-widget -->
@endsection