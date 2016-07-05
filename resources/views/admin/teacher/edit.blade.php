@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">教师编辑
        <span class="hed_te_span"><a href="{{ url('/admin/teacher') }}">管理</a><a class="" href="{{ url('/admin/teacher/add') }}">添加</a></span></h3>
    <!--当前位置 end-->
    <div class="smart-widget">
        <div class="smart-widget-inner">
            <div class="smart-widget-body">
                <form class="form-horizontal no-margin form-border" id="basic-constraint" method="post" action="{{ url('/admin/teacher/edit') }}" novalidate>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-lg-2">姓名：</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" value="{{ $teacher->name }}" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">职工号：</label>
                        <div class="col-lg-10">
                            <input type="text" name="teacher_id" value="{{ $teacher->teacher_id }}" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">手机号码：</label>
                        <div class="col-lg-10">
                            <input type="text" name="mobile" value="{{ $teacher->mobile }}" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="text-center m-top-md">
                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                        <button type="submit" class="btn btn-info">提交</button>
                    </div>
                </form>
            </div>
        </div><!-- ./smart-widget-inner -->
    </div><!-- ./smart-widget -->
@endsection