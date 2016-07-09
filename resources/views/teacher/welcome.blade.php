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
        <div class="user_img"><img src="/images/face.png" /></div>
        <p>欢迎您：{{ $teacher->name }} 老师</p>
    </div>
    <div class="all_edit">
        <ul>
            <li><a href="{{ url('/task/add') }}">发布<br/>作业</a></li>
            <li><a href="edit_active.html">发布<br/>活动</a></li>
        </ul>
    </div>
    <div class="module">
        <ul>
            <li>
                <a href="../task.html"><span><img src="/images/icon/icon_subject.png" /></span><i></i>作业</a>
            </li>
            <li>
                <a href="grade_single_table.html"><span><img src="/images/icon/icon_grade.png" /></span><i></i>成绩查询</a>
            </li>
            <li>
                <a href="{{ url('/teacher/classes') }}"><span><img src="/images/icon/icon_class.png" /></span><i></i><b>{{ count($teacher->courses) }}</b>任教班级</a>
            </li>
            <li>
                <a href="habit_more.html"><span><img src="/images/icon/icon_habit_user.png" /></span><i></i>习惯养成</a>
            </li>
            <li>
                <a href="/leave_mgs_list.html"><span><img src="/images/icon/leave_user.png" /></span><i></i><b>5</b>我的留言</a>
            </li>
        </ul>
    </div>
</div>
</body>
</html>