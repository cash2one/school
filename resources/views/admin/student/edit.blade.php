@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">学生
        <span class="hed_te_span">
            <a href="{{ url('/admin/classes/detail',['id' => Auth::user()->classes->id]) }}">管理</a>
            <a class="cursa" href="{{ url('/admin/student/add',['id' => Auth::user()->classes->id]) }}">新增</a>
        </span>
    </h3>
    <!--当前位置 end-->
    <div class="smart-widget">
        <div class="smart-widget-inner">
            <div class="smart-widget-body">
                <form class="form-horizontal no-margin form-border" method="post" action="{{ url('/admin/student/add') }}" id="basic-constraint" novalidate>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-lg-2">学生姓名：</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control input-sm" name="name" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">学号：</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control input-sm" name="student_id" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">性别：</label>
                        <div class="col-lg-10">
                            <label style="position:relative; float:left; margin-right:20px;">
                                <input  type="radio" name="sex" value="1" checked id="RadioGroup1_0">男
                            </label>
                            &nbsp;&nbsp;&nbsp;
                            <label style="position:relative; float:left">
                                <input type="radio" name="sex" value="2" id="RadioGroup1_1">女
                            </label>
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="text-center m-top-md">
                        <input type="hidden" value="{{ $classes->id }}" name="classes_id" />
                        <button type="submit" class="btn btn-info">提交</button>
                    </div>
                </form>
            </div>
        </div><!-- ./smart-widget-inner -->
    </div><!-- ./smart-widget -->
@endsection