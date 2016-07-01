@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <!--当前位置 begin-->
    <h3 class="header-text">班级
        <span class="hed_te_span"><a href="#">管理</a><a class="cursa" href="#">添加</a></span></h3>
    <!--当前位置 end-->
    <div class="smart-widget">
        <div class="smart-widget-inner">
            <div class="smart-widget-body">
                <form class="form-horizontal no-margin form-border" id="basic-constraint" method="post" action="{{ url('/admin/classes/edit') }}" novalidate>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-lg-2">班级名称：</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" value="{{ $classes->name }}" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">所属年级：</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="grade">
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="text-center m-top-md">
                        <input type="hidden" name="id" value="{{ $classes->id }}">
                        <button type="submit" class="btn btn-info">提交</button>
                    </div>
                </form>
            </div>
        </div><!-- ./smart-widget-inner -->
    </div><!-- ./smart-widget -->
@endsection