<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>教师个人中心</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/school.css" >
</head>
<body>
<div class="warp_bg">
    <div class="user_top">
        <div class="user_img"><img src="{{ $wechatUser['headimgurl'] }}" /></div>
        <p>欢迎您：{{ $teacher->name }} 老师</p>
    </div>
    <div class="all_edit">
        <ul>
            <li onclick="notic()"><a href="javascript:void(0);">发布<br/>通知</a></li>
            <li><a href="{{ url('/teacher/task/add') }}">发布<br/>作业</a></li>
            <li><a href="{{ url('/teacher/activity/add') }}">发布<br/>活动</a></li>
        </ul>
    </div>
    <div class="module">
        <ul>
            <li>
                <a href="{{ url('/teacher/task') }}"><span><img src="/images/icon/icon_subject.png" /></span><i></i>作业</a>
            </li>
            <!--
            <li>
                <a href="{{ url('/teacher/exam') }}"><span><img src="/images/icon/icon_grade.png" /></span><i></i>成绩查询</a>
            </li>
            -->
            <li>
                <a href="{{ url('/teacher/classes') }}"><span><img src="/images/icon/icon_class.png" /></span><i></i><b>{{ count($teacher->courses) }}</b>任教班级</a>
            </li>
            <li>
                <a href="{{ url('/teacher/activity') }}"><span><img src="/images/icon/icon_habit_user.png" /></span><i></i>习惯养成</a>
            </li>
            <li>
                <a href="{{ url('/teacher/message') }}"><span><img src="/images/icon/leave_user.png" /></span><i></i><b>{{ count(Auth::user()->getUnReadMessage) }}</b>我的留言</a>
            </li>
            @if(!Auth::user()->hasRole('parents'))
            <li>
                <a href="{{ url('/student/bind') }}"><span><img src="/images/icon/icon_bind.png" /></span><i></i>成为家长</a>
            </li>
            @endif
        </ul>
    </div>
</div>
@include('layout.footer')
</body>
</html>