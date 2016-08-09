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
    <div class="student_border">
        <div class="student">
            <div class="student_poto"><img src="/images/face.png" /></div>
            <div class="student_msg">
                <h3>姓名：<span>江小鱼</span></h3>
                <p>学校：实验小学</p>
                <p>班级：一年级（3）班</p>
            </div>
            <div class="incited_btn"><a href="#">邀请绑定</a></div>
        </div>
    </div>
</div>
<div class="jump_box">
    <p><span class="arrow"><img src="/images/arrow.png" /></span>点击右上角发给好友！</p>
</div>
<style>
    .invited{height: 100%; background: #000 url(/images/invited.jpg) no-repeat; background-size: cover; overflow: hidden; }
    .in_bind{ background:url(/images/gd.jpg) no-repeat center; background-size: cover; overflow: hidden;}
    .in_mind{ line-height: 2rem;padding: 1rem 0; border-bottom: .1rem dashed #00AC92; margin-bottom: 2rem; font-size: 1.4rem;}
    .in_mind span{ color: #f60; margin: 0 .5rem;}
    .student{ width: 86%; margin: 12rem auto 0; background: rgba(255,255,255,.7); position: relative; height: auto; box-sizing: border-box; padding: 3rem 2rem; border-radius: .3rem; }
    .in_bind .student{margin: 3rem auto 0; padding: 2rem;}
    .student_poto{  width: 6rem; height: 6rem; border-radius: 50%; border: .2rem solid #fff; overflow: hidden; float: left; margin-right: 1rem; }
    .student_msg h3{ font-weight: normal; font-size: 1.4rem; line-height: 2rem;}
    .student_msg h3 span{ font-size: 1.6rem;}
    .student_msg p{ font-size: 1.4rem; line-height: 2rem;}
    .incited_btn{ width: 100%; margin: 5rem 0 0; background: #00AC92; color: #fff; text-align: center; height:4rem; border-radius: .3rem; line-height: 4rem;}
    .jump_box{ position: fixed; background: rgba(0,0,0,0.8); z-index: 111; width: 100%; height: 100%; left: 0; bottom: 0;}
    .jump_box p{ width: 80%; margin: 8rem auto; color: #fff;}
    .jump_box .arrow{ float: right; width: 6rem;}
    .be_invited{ margin-top: 3rem; padding: 2rem 0; border-top: .1rem dashed #00AC92;}
    .be_invited p{ padding: .5rem 0;}
    .be_invited span{ position: absolute;}
    .be_invited p input[type=text]{ height: 4rem; border: .1rem solid #00AC92; background: none; box-sizing: border-box; border-radius: .3rem; padding: 0 .5rem; width: 100%; font-family: "Microsoft Yahei", "微软雅黑"}
    .be_invited_btn input[type=submit]{ width: 100%; background: #00AC92; color: #fff; font-size: 1.6rem; border: none; border-radius: .3rem; height: 4rem; margin-top: 2rem; font-family: "Microsoft Yahei", "微软雅黑" }
</style>
</body>
</html>