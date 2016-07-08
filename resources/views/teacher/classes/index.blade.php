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
                <a href="{{ url('/teacher/course/detail',['id' => $course->id]) }}">
                    <p>
                        <span>{{ $course->grade->name }}（{{ $course->classes->name }}）</span>
                        <sapn>任课：{{ $course->name}}</sapn>
                    </p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>