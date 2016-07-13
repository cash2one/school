<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>家长评价</title>
    <link rel="stylesheet" type="text/css" href="css/common.css" >
    <link rel="stylesheet" type="text/css" href="css/style.css" >
</head>
<body>
<style>

</style>
<div class="habit_bg">
    <div class="habit_men"><img src="images/face.png" /></div>
    <div class="habit">
        <h3>{{ $student->name }}</h3>
        <div class="habit_cont">
            <p><span>任务</span><br/>{{ $activity->name }}。</p>
            <p><span>执行时间</span><br/>{{ date('Y-m-d',$activity->start_at) }} 至 {{ date('Y-m-d',$activity->end_at) }}</p>
        </div>
        <div class="part_btn">
            <a class="join_btn">报名参与</a>
            <!--<a class="part_end">活动结束</a>-->
            <!--<a class="part_join">已报名</a>-->
        </div>
        <p class="split"><span class="split_left"></span><span class="split_right"></span></p>
        <div class="rate">
            <div class="rate_top"><span></span><i>家长评价</i></div>
            <ul>
                <li><span>2015-05-12</span><p class="two"><b class="a_one"></b><b class="a_two"></b><b class="a_three"></b><b class="a_four"></b><b class="a_five"></b></p></li>
                <li><span>2015-05-12</span><p class="four"><b class="a_one"></b><b class="a_two"></b><b class="a_three"></b><b class="a_four"></b><b class="a_five"></b></p></li>
                <li><span>2015-05-12</span><p><b class="a_one"></b><b class="a_two"></b><b class="a_three"></b><b class="a_four"></b><b class="a_five"></b></p></li>
            </ul>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
    $(".a_one").click(function(){
        $(this).parents("li p").attr("class","one")
    });
    $(".a_two").click(function(){
        $(this).parents("li p").attr("class","two")
    });
    $(".a_three").click(function(){
        $(this).parents("li p").attr("class","three")
    });
    $(".a_four").click(function(){
        $(this).parents("li p").attr("class","four")
    });
    $(".a_five").click(function(){
        $(this).parents("li p").attr("class","five")
    });
</script>
</body>
</html>