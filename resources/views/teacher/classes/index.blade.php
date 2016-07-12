<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>老师任课班级列表</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
</head>
<body>
<div class="warp_bg">
    <div class="course">
        <ul>
            @foreach($courses as $course)
                <li>
                    <div class="course_box">
                        <a href="{{ url('/teacher/course/detail',['id' => $course->id]) }}">
                            <span>{{ $course->grade->name }}（{{ $course->classes->name }}）</span>
                            <span>任课：{{ $course->name}}</span>
                        </a>
                        <p>
                            <a class="work" href="{{ url('/teacher/task/add',['id' => $course->id]) }}">发布作业</a>
                            <a class="task" href="{{ url('/teacher/act/add',['id' => $course->id]) }}">发布任务</a>
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>