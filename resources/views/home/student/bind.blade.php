<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>家长绑定</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/school.css" >
</head>
<body>
<div class="frame">
    <div class="bind">
        <form id="bind_parent">

            <ul class="bind_mgs">
                <li><p>学生姓名：<input name="student_name" type="text"/><b></b></p></li>
                <li><p>所在学校：<input name="school_name" type="text"/><b></b></p></li>
                <!--
                <li><p>所在班级：<input name="class_name" type="text"/><b></b></p></li>
                -->
                <li><p>学生学号：<input name="student_num" type="text"/><b></b></p></li>
                <!--
                <li><p>出生日期：<input name="birthday" type="text"/><b></b></p></li>
                <li><p>学生性别：<span><input type="radio" name="sex" id="men" checked="checked" /><label for="men">男</label></span><span><input  name="sex" id="women"  type="radio" /><label for="women">女</label></span></p></li>
                <li><p>所属关系：<input type="text"/></p></li>
                -->
            </ul>
            <p>
                <!--<a class="bind_btn" href="user_parent.html">立即绑定</a>-->
                <input class="bind_btn" type="submit" value="立即绑定" />
            </p>
        </form>
    </div>
</div>
<div class="blank_bg">
    <div class="tip_box">
        <p>绑定成功！</p>
        <div class="tip_btn"><a href="#">继续添加</a><a href="#">稍后添加</a></div>
    </div>
</div>
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.validation.min.js"></script>
<script>
    $(document).ready(function(){

        $('#bind_parent').validate({
            onkeyup: false,
            errorPlacement: function(error, element){
                element.nextAll('b').first().after(error);
            },
            submitHandler:function(form){
                ajaxpost('bind_parent', '', '', 'onerror');
            },
            rules: {
                student_name: {
                    required: true,
                },
                school_name: {
                    required: true,
                },
                class_name: {
                    required: true,
                    number:true
                },

                student_num: {
                    required: true,
                },
                birthday: {
                    required: true,
                },
            },
            messages: {
                student_name: {
                    required: '此项不能为空',
                },
                school_name: {
                    required: '此项不能为空',
                },
                class_name: {
                    required: '此项不能为空',
                },
                student_num: {
                    required: '此项不能为空',
                    number: '请填写数字',
                },
                birthday: {
                    required: '此项不能为空',
                },
            }
        });
    });
</script>
</body>
</html>