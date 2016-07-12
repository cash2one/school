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
        <div class="user_img"><img src="../images/face.png" /></div>
        <p>欢饮您：{{ $user->name }}</p>
    </div>
    <div class="module">
        <ul>
            <li>
                <a href="{{ url('/family/news') }}"><span><img src="/images/icon/icon_news.png" /></span><i></i>通知</a>
            </li>
            <li>
                <a href="{{ url('/family/message') }}"><span><img src="/images/icon/leave_user.png" /></span><i></i>我的留言</a>
            </li>
            <li>
                <a href="{{ url('/family/task') }}"><span><img src="/images/icon/icon_subject.png" /></span><i></i>作业查询</a>
            </li>
            <li>
                <a href="grade.html"><span><img src="/images/icon/icon_grade.png" /></span><i></i>成绩查询</a>
            </li>
            <li>
                <a href="habit_more.html"><span><img src="/images/icon/icon_habit_user.png" /></span><i></i>习惯养成</a>
            </li>
            <li>
                <a href="{{ url('/family/student') }}"><span><img src="/images/icon/icon_set.png" /></span><i></i><b>{{ count($user->family->students) }}</b>我的孩子</a>
            </li>
        </ul>
    </div>
</div>
</body>
</html>