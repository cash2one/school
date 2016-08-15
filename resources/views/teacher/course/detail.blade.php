<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>班级成绩单</title>
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
        <table id="example" cellspacing="0">
            <thead>
            <tr>
                <th>学号</th>
                <th>姓名</th>
                <th>成绩</th>
                <th>排名</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>学号</th>
                <th>姓名</th>
                <th>成绩</th>
                <th>排名</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($scores as $score)
            <tr>
                <td>{{ $score->student->student_id }}</td>
                <td>{{ $score->student->name }}</td>
                <td>{{ $score->val }}</td>
                <td>{{ $score->sortVal($scores,$score->val) }}<!--<i class="up"></i>--></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="single_grade">
            暂无考试
        </div>
    @endif
</div>
@include('layout.footer')
</body>
</html>