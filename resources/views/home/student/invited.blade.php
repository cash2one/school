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
<div class="invited in_bind">
    <div class="student">

        <div class="in_mind">您的好友<span>令居</span>邀请您绑定学生<span>江小鱼</span></div>
        <div class="student_poto"><img src="/images/face.png" /></div>
        @foreach($students as $student)
        <div class="student_msg">
            <h3>姓名：<span>{{ $student->name }}</span></h3>
            <p>学校：{{ $student->school->name }}</p>
            <p>班级：{{ $student->grade->name }}{{ $student->classes->name }}</p>
        </div>
        @endforeach
        <div class="be_invited clear">
            <form>
                @foreach($students as $student)
                    <input type="hidden" value="{{ $student->id }}" name="students[]">
                @endforeach
                <p><input type="text" placeholder="姓名" /></p>
                <p><input type="text" placeholder="手机号" /></p>
                <div class="be_invited_btn"><input type="submit" value="立即绑定" /></div>
            </form>
        </div>
    </div>
</div>
</body>
</html>