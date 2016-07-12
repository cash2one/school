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
            <div class="portrait">
                <p class="por_img fillet"><img src="/images/icon/icon_camera.gif" /></p>
            </div>
            <ul class="bind_mgs">
                <li><p><strong><img src="/images/icon/icon_num.png" /></strong><input name="student_num" placeholder="学生学号" type="text"/><b></b></p></li>
                <li><p><strong><img src="/images/icon/icon_phone.png" /></strong><input placeholder="手机号" name="phone" type="text"/><b></b></p></li>
                <li><p><strong><img src="/images/icon/icon_check.png" /></strong><input name="check_num"  placeholder="手机验证码" class="input_check" type="text"/><b></b><input class="check_btn" type="button" value="获取验证码" /></p></li>
            </ul>
            <p>
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
                student_num: {
                    required: true,
                },
                phone: {
                    required: true,
                    digits:true,
                    rangelength:[11,11]
                },
                check_num: {
                    required: true,
                    number:true
                },
            },
            messages: {
                student_num: {
                    required: '此项不能为空！',
                },
                phone: {
                    required: '此项不能为空！',
                    digits:'您填写的手机号格式有误！',
                    rangelength:'您填写的手机号格式有误！',
                },
                check_num: {
                    required: '此项不能为空！',
                    number: '请填写正确的验证码！'
                },
            }
        });
    });
</script>

</body>
</html>