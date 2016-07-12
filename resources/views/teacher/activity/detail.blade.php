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
            <p><span>参与人数</span><b><i>23</i>人</b></p>
        </div>
        <p class="split"><span class="split_left"></span><span class="split_right"></span></p>
        <div class="rate">
            <div class="rate_top"><span></span><i>综合分析</i></div>
            <ul>
                <li><a href="#"><span>5人<i>50%</i></span><p></p></a></li>
                <li><a href="#"><span>8人<i>50%</i></span><p class="one"></p></a></li>
                <li><a href="#"><span>10人<i>50%</i></span><p class="two"></p></a></li>
                <li><a href="#"><span>5人<i>50%</i></span><p class="three"></p></a></li>
                <li><a href="#"><span>8人<i>50%</i></span><p class="four"></p></a></li>
                <li><a href="#"><span>10人<i>50%</i></span><p class="five"></p></a></li>
            </ul>
        </div>
        <p class="split"><span class="split_left"></span><span class="split_right"></span></p>
        <div class="link_btn">
            <a href="habit_day.html">查看每天星级分析</a>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
</body>
</html>