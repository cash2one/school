<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>发起活动</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <!--date-css-->
    <link href="/css/date/mobiscroll_002.css" rel="stylesheet" type="text/css">
    <link href="/css/date/mobiscroll.css" rel="stylesheet" type="text/css">
    <link href="/css/date/mobiscroll_003.css" rel="stylesheet" type="text/css">

    <script src="/js/jquery.js"></script>
</head>
<body>
<div class="warp_bg">
    <form id="edit_active" method="post" action="{{ url('/teacher/activity/add') }}">
        {!! csrf_field() !!}
        <div class="cover_box">
            <p><input type="text" name="name" placeholder="活动主题" /><b></b></p>
            <p><input placeholder="活动开始时间" readonly="readonly" name="start_time" class="appDate" type="text"><b></b></p>
            <p><input placeholder="活动结束时间" readonly="readonly" name="end_time" class="appDate" type="text"><b></b></p>
            <div class="text_cont"><textarea name="detail" placeholder="活动简介"></textarea></div>
        </div>
        <div class="select_grade">
            <p class="title">选择班级：</p>
            <ul>
                @foreach($courses as $course)
                    <li data-id="{{ $course->id }}">
                        <img src="/images/icon/icon_select_now.png" />
                        <p>
                            <i>{{ $course->grade->name }}{{ $course->classes->name }}</i>
                            <span>{{ $course->name }}</span>
                        </p>
                    </li>
                @endforeach
            </ul>
            <p class="clear"></p>
        </div>
        <div class="edit_btn">
            <input class="fr sure_btn" type="submit" value="发布" />
        </div>
    </form>
</div>

@include('layout.footer')

<!--date-js-->
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

<script language="javascript" type="text/javascript" src="/js/jquery.validation.min.js"></script>
<script>
    $(document).ready(function(){

        $('#edit_active').validate({
            onkeyup: false,
            errorPlacement: function(error, element){
                element.nextAll('b').first().after(error);
            },
            submitHandler:function(form){
                ajaxpost('edit_active', '', '', 'onerror');
            },
            rules: {
                name: {
                    required: true
                },
                start_time: {
                    required: true
                },
                end_time: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: '此项不能为空'
                },
                start_time: {
                    required: '此项不能为空'
                },
                end_time: {
                    required: '此项不能为空'
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(".select_grade li").click(function(){
        $(this).toggleClass("now");

        if($(this).hasClass('now'))
        {
            var input = $("<input name='course_id[]' type='hidden'>");

            input.val($(this).attr('data-id'));

            $(this).append(input);
        }
        else
        {
            $(this).find('input').remove();
        }
    });
    $(function(){

        $(".select_grade ul li").first().click();

    });
</script>
</body>
</html>