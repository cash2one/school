<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>家长评价</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <meta name="_token" content="{{ csrf_token() }}"/>
</head>
<body>
<style>

</style>
<div class="habit_bg">
    <div class="habit_men"><img src="/images/face.png" /></div>
    <div class="habit">
        <h3>{{ $student->name }}</h3>
        <div class="habit_cont">
            <p><span>任务</span><br/>{{ $activity->name }}。</p>
            <p><span>执行时间</span><br/>{{ date('Y-m-d',$activity->start_at) }} 至 {{ date('Y-m-d',$activity->end_at) }}</p>
        </div>
        <div class="part_btn">
            <!--<a class="join_btn">报名参与</a>-->
            <!--<a class="part_end">活动结束</a>-->
            <!--<a class="part_join">已报名</a>-->
        </div>
        <p class="split"><span class="split_left"></span><span class="split_right"></span></p>
        <div class="rate">
            <div class="rate_top"><span></span><i>家长评价</i></div>
            <ul>
                @foreach($scores as $score)
                <li>
                    <span>{{ substr($score->created_at,0,10) }}</span>
                    @if($score->score > 0)
                    <p class="two">
                    @else
                    <p class="zone">
                    @endif
                        <b class="a_one" data-val = 1></b>
                        <b class="a_two" data-val = 2></b>
                        <b class="a_three" data-val = 3></b>
                        <b class="a_four" data-val = 4></b>
                        <b class="a_five" data-val = 5></b>
                    </p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.noty.packaged.min.js"></script>
<script type="text/javascript">
    /*
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
    */

    $('.zone b').bind('click',function(){

        console.log($(this).attr('data-val'));

        var student_id = '{{ $student->id }}';

        var activity_id = '{{ $activity->id }}';

        var score = $(this).attr('data-val');

        $.ajax({
            type: 'POST',
            url: '{{ url('/family/activity/score') }}',
            data: {student_id:student_id,activity_id:activity_id,score:score},
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(data){

                noty({
                    text: data.msg,
                    type: data.code,
                    layout: 'center',
                    timeout: '1500'
                });

            },
            error: function(xhr, type){
                noty({
                    text: '请求失败',
                    type: 'error',
                    layout: 'center',
                    timeout: '3000'
                });
            }
        });

    });
</script>
</body>
</html>