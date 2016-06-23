@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
@endsection
@section('content')
    <h3 class="header-text">学校
        <span class="hed_te_span"><a href="#">管理</a><a class="cursa" href="#">添加</a></span></h3>
    <!--当前位置 end-->
    <div class="smart-widget">
        <div class="smart-widget-inner">
            <div class="smart-widget-body">
                <form class="form-horizontal no-margin form-border" id="school_add" method="post" action="{{ url('/admin/school/add') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="control-label col-lg-2">学校名称：</label>
                        <div class="col-lg-3">
                            <input type="text" name="name" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">学校属性：</label>
                        <div class="col-lg-1">
                            <select name="type" class="form-control">
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">负责人：</label>
                        <div class="col-lg-1">
                            <input type="text" name="charge" class="form-control input-sm"  >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <label class="control-label col-lg-2">联系方式：</label>
                        <div class="col-lg-2">
                            <input type="text" name="phone" class="form-control input-sm"  >
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