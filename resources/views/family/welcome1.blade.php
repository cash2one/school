<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>家长个人中心</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/school.css" >
</head>
<body>
<div class="warp_bg">
    <div class="user_top">
        <div class="user_img"><img src="{{ $wechatUser['headimgurl'] }}" /></div>
        <p>{{ $student->name }}</p>
        <p>{{ $student->grade->name }}{{ $student->classes->name }}</p>
    </div>
    <div class="module">
        <ul>
            <li>
                <a href="{{ url('/family/news/student',['id' => $student->id]) }}"><span><img src="/images/icon/icon_news.png" /></span><i></i>通知</a>
            </li>
            <li>
                <a href="{{ url('/family/message') }}"><span><img src="/images/icon/leave_user.png" /></span><i></i>我的留言</a>
            </li>
            <li>
                <a href="{{ url('family/task/student',['id' => $student->id]) }}"><span><img src="/images/icon/icon_subject.png" /></span><i></i>作业查询</a>
            </li>
            <li>
                <a href="{{ url('family/exam/student',['id' => $student->id]) }}"><span><img src="/images/icon/icon_grade.png" /></span><i></i>成绩查询</a>
            </li>
            <li>
                <a href="{{ url('family/activity/student',['id' => $student->id]) }}"><span><img src="/images/icon/icon_habit_user.png" /></span><i></i>习惯养成</a>
            </li>
            <li>
                <a href="{{ url('/family/message/add',['sid' => $student->id]) }}"><span><img src="/images/icon/icon_teacher.png" /></span><i></i>给老师留言</a>
            </li>
            @if(!Auth::user()->hasRole('teacher'))
                <li>
                    <a href="{{ url('/bind/teacher') }}"><span><img src="/images/icon/icon_bind.png" /></span><i></i>成为老师</a>
                </li>
            @endif
        </ul>
    </div>
</div>
@if($status['code'] == 'fail')
    <div class="blank_bg" style="display: block;">
        <div class="pay_tip">
            <h3>温馨提醒</h3>
            <p>{{ $status['msg'] }}</p>
            <a class="btn" href="{{ url('/order/buy',['id' => $student->id]) }}">去付费</a>
        </div>
    </div>
@endif
@include('layout.footer')
</body>
</html>