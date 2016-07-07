@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">新增课程
        <span class="hed_te_span">
            <a href="{{ url('/admin/course/classes',['id' => Auth::user()->classes->id]) }}">管理</a>
        </span>
    </h3>
    <!--当前位置 end-->
    <div class="smart-widget">
        <div class="smart-widget-inner">
            <div class="smart-widget-body">
                <form class="form-horizontal no-margin form-border" method="post" action="{{ url('/admin/course/add') }}" id="basic-constraint" novalidate>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-lg-2">课程名称：</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control input-sm" value="{{ $course->name }}" name="name" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">任课老师：</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="teacher_id">
                                @foreach($classes->school->teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="text-center m-top-md">
                        <input type="hidden" value="{{ $classes->id }}" name="classes_id" />
                        <input type="hidden" value="{{ $course->id }}" name="id" />
                        <button type="submit" class="btn btn-info">提交</button>
                    </div>
                </form>
            </div>
        </div><!-- ./smart-widget-inner -->
    </div><!-- ./smart-widget -->
@endsection