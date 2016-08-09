<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>身份选择</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/school.css" >
    <script src="/js/jquery.js"></script>
</head>
<body>
<div class="invited">
    @foreach($students as $student)
    <div class="student">
        <div class="student_poto"><img src="/images/face.png" /></div>
        <div class="student_msg">
            <h3>姓名：<span>{{ $student->name }}</span></h3>
            <p>学校：{{ $student->school->name }}</p>
            <p>班级：{{ $student->grade->name }}{{ $student->classes->name }}</p>
        </div>
        <div class="incited_btn"><a href="javascript:void(0);">邀请绑定</a></div>
    </div>
    @endforeach
</div>
<div class="jump_box" style="display: none;">
    <p><span class="arrow"><img src="/images/arrow.png" /></span>点击右上角发给好友！</p>
</div>
</body>
</html>