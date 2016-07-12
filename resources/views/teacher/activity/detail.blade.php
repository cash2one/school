<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>活动详情</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
</head>
<body>
<style>

</style>
<div class="habit_bg">
    <div class="habit">
        <div class="habit_cont">
            <p><span>任务</span><br/>{{ $activity->name }}</p>
            <p><span>执行时间</span><br/>{{ date('Y-m-d',$activity->start_at) }} 至 {{ date('Y-m-d',$activity->end_at) }}</p>
            <p><span>参与对象</span><b>{{ $activity->grade->name }} {{ $activity->classes->name }}</b></p>
        </div>
        <p class="split"><span class="split_left"></span><span class="split_right"></span></p>
        <div class="rate">
            <div class="rate_top"><span></span><i>综合分析</i></div>
            <ul>
                <li><a href="{{ url('/teacher/activity/score',['id' => $activity->id,'score' => 0]) }}"><span>5人<i>50%</i></span><p></p></a></li>
                <li><a href="{{ url('/teacher/activity/score',['id' => $activity->id,'score' => 1]) }}"><span>8人<i>50%</i></span><p class="one"></p></a></li>
                <li><a href="{{ url('/teacher/activity/score',['id' => $activity->id,'score' => 2]) }}"><span>10人<i>50%</i></span><p class="two"></p></a></li>
                <li><a href="{{ url('/teacher/activity/score',['id' => $activity->id,'score' => 3]) }}"><span>5人<i>50%</i></span><p class="three"></p></a></li>
                <li><a href="{{ url('/teacher/activity/score',['id' => $activity->id,'score' => 4]) }}"><span>8人<i>50%</i></span><p class="four"></p></a></li>
                <li><a href="{{ url('/teacher/activity/score',['id' => $activity->id,'score' => 5]) }}"><span>10人<i>50%</i></span><p class="five"></p></a></li>
            </ul>
        </div>
        <p class="split"><span class="split_left"></span><span class="split_right"></span></p>
    </div>
</div>
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
</body>
</html>