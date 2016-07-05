@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">班级
        <span class="hed_te_span"><a href="{{ url('/admin/grade') }}">管理</a><a class="cursa" href="{{ url('/admin/grade/add') }}">添加</a></span></h3>
    <!--当前位置 end-->
    <div class="smart-widget">
        <div class="smart-widget-inner">
            <div class="smart-widget-body">
                <form class="form-horizontal no-margin form-border" id="basic-constraint" method="post" action="{{ url('/admin/grade/add') }}" novalidate>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-lg-2">年级名称：</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">负责人：</label>
                        <div class="col-lg-10">
                            <input type="text" name="user_name" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">账号：</label>
                        <div class="col-lg-10">
                            <input type="text" name="email" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">密码：</label>
                        <div class="col-lg-10">
                            <input type="text" name="password" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="text-center m-top-md">
                        <button type="submit" class="btn btn-info">提交</button>
                    </div>
                </form>
            </div>
        </div><!-- ./smart-widget-inner -->
    </div><!-- ./smart-widget -->
@endsection