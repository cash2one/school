<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>班级单科成绩单</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/school.css" >
</head>
<body>
<div class="warp_bg">
    <div class="stud_top">
        <div class="top_img fl"><img src="/images/face.png" /></div>
        <div class="top_cont">
            <p><span>班主任：</span>{{ $course->classes->principal->name }}</p>
            <p><span>班&nbsp;&nbsp;&nbsp;级：</span>{{ $course->grade->name }}（{{ $course->classes->name }}）</p>
        </div>
    </div>
    @if(isset($scores))
    <div class="single_grade">
        <dl>
            <dt>学号</dt>
            <dt>姓名</dt>
            <dt>成绩</dt>
            <dt>排名</dt>
        </dl>
        @foreach($scores as $score)
        <dl>
            <dd>{{ $score->student->student_id }}</dd>
            <dd>{{ $score->student->name }}</dd>
            <dd>{{ $score->val }}</dd>
            <dd>{{ $score->sortVal($scores,$score->val) }}<!--<i class="up"></i>--></dd>
        </dl>
        @endforeach
    </div>
    @endif
</div>
@include('layout.footer')
</body>
</html>