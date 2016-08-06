@extends('layout.admin')
@section('header')
    <link href="/css/ccadd.min.css" rel="stylesheet" />
    <link href="/css/date/mobiscroll_002.css" rel="stylesheet" type="text/css">
    <link href="/css/date/mobiscroll.css" rel="stylesheet" type="text/css">
    <link href="/css/date/mobiscroll_003.css" rel="stylesheet" type="text/css">
    <script src="/js/date/mobiscroll_002.js" type="text/javascript"></script>
    <script src="/js/date/mobiscroll_004.js" type="text/javascript"></script>
    <script src="/js/date/mobiscroll.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            var currYear = (new Date()).getFullYear();
            var opt={};
            opt.date = {preset : 'date'};
            opt.datetime = {preset : 'datetime'};
            opt.time = {preset : 'time'};
            opt.default = {
                theme: 'android-ics light', //皮肤样式
                display: 'modal', //显示方式
                mode: 'scroller', //日期选择模式
                dateFormat: 'yyyy-mm-dd',
                lang: 'zh',
                showNow: true,
                nowText: "今天",
                startYear: currYear - 10, //开始年份
                endYear: currYear + 10 //结束年份
            };

            $(".appDate").mobiscroll($.extend(opt['date'], opt['default']));
        });
    </script>
@endsection
@section('content')
    <h3 class="header-text">学校设置
        <span class="hed_te_span"><a href="{{ url('/admin/school/setting') }}">学校设置</a></span></h3>
    <!--当前位置 end-->
    <div class="smart-widget">
        <div class="smart-widget-inner">
            <div class="smart-widget-body">
                <form class="form-horizontal no-margin form-border" id="school_add" method="post" action="{{ url('/admin/school/setting') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="control-label col-lg-2">学校名称：</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" property="请输入学校名称" value="{{ $school->name }}" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label class="control-label col-lg-2">服务费：</label>
                        <div class="col-lg-10">
                            <input type="text" name="service_charges" property="请输入服务费" value="{{ $school->service_charges }}" class="form-control input-sm" >
                        </div><!-- /.col -->
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label class="control-label col-lg-2">免费时间：</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control input-sm appDate" readonly="readonly" name="date_start"  >
                            <span class="help-block"></span>
                        </div><!-- /.col -->
                        <div class="col-lg-4">
                            <input type="text" class="form-control input-sm appDate" readonly="readonly" name="date_end" >
                            <span class="help-block"></span>
                        </div><!-- /.col -->
                        <label class="control-label col-lg-1">共计（天）：</label>
                        <div class="col-lg-1">
                            <span class="help-block text-danger">123</span>
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