<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>全部活动</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/miss.js"></script>
</head>
<body>
<div class="warp_bg">
    <div class="notice_type">
        <ul>
            <li><a href="{{ url('/teacher/news') }}">通知</a></li>
            <li><a href="{{ url('/teacher/task') }}">作业</a></li>
            <li class="cur"><a href="{{ url('/teacher/activity') }}">活动</a></li>
        </ul>
    </div>
    <div class="notice">
        <ul>
            @foreach($activitys as $activity)
                <li>
                    <!--{{ url('/teacher/activity/detail',['id' => $activity->id]) }}-->
                    <a href="{{ url('/teacher/activity/detail',['id' => $activity->id]) }}" onclick="notic()">
                        <div class="notice_cont">
                            <h3>{{ $activity->name }}</h3>
                            <p><span class="fl">{{ $activity->created_at }}</span>{{ $activity->grade->name }} {{ $activity->classes->name }}</p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
<!--返回顶部-->
<div class="gotop"><a onclick="gotoTop();return false;"><img src="/images/icon/icon_top.png" /></a></div>
<!--返回顶部 end-->
@include('layout.footer')
</body>
</html>