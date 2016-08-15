<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>{{ $student->name }}</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
    <link rel="stylesheet" type="text/css" href="/css/school.css" >
</head>
<body>
<div class="warp_bg">
    <div class="stud_top">
        <div class="top_img fl"><img src="/images/face.png" /></div>
        <div class="top_cont">
            <p>{{ $student->name }}</p>
            <p>{{ $student->grade->name }}{{ $student->classes->name }}</p>
        </div>
    </div>

    <div class="grade_type_cc clearfix">
        <ul>
            <li><a href="{{ url('/family/message/add',['sid' => $student->id]) }}"><img src="/images/icon/leave_user.png"><p>发留言</p></a></li>
            <li><a href="{{ url('family/task/student',['id' => $student->id]) }}"><img src="/images/icon/icon_subject.png"><p>作业查询</p></a></li>
            <li><a href="{{ url('family/exam/student',['id' => $student->id]) }}"><img src="/images/icon/icon_grade.png"><p>成绩查询</p></a></li>
            <li><a href="{{ url('family/activity/student',['id' => $student->id]) }}"><img src="/images/icon/icon_habit_user.png"><p>习惯养成</p></a></li>
        </ul>
    </div>
    <style>
        .grade_type_cc{ width:100%; display:block; margin:0rem 0 3rem;}
        .grade_type_cc li{ width:25%; float:left; padding:2rem 0; box-sizing:border-box; border-right:1px solid #f0f0f0; border-bottom:1px solid #f0f0f0;}
        .grade_type_cc li a{ width:100%; text-align:center; display:block; color:inherit; font-size:1.4rem;}
        .grade_type_cc li a img{width:40%;}
    </style>
    @if(isset($firstScores))
    <div class="grade_box">
    <div class="graph_title"><span></span>最新成绩</div>
        <ul>
            @foreach($firstScores as $score)
                @if($student->id == $score->student_id)
                    <li>
                        <a href="javascript:void(0);">
                            <p class="grade_num">{{ $score->val }}</p>
                            <p class="grade_subject">{{ $score->course->name }}</p>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
        <p class="clear"></p>
    </div>
    <div class="agg">
        <ul>
            <li><span>总分：{{ $firstTotal }}</span></li>
            <li><span>班级：{{ $firstSort }}</span></li>
            <li><span>年级：暂无</span></li>
        </ul>
        <p class="clear"></p>
    </div>
    <div class="graph_title"><span></span>学情分析
        <ul  class="graph_type">
            <li><a href="#"><i></i>分数</a></li>
            <li><a href="#"><i></i>班级</a></li>
            <li><a href="#"><i></i>年级</a></li>
        </ul>
    </div>
    <div class="graph">
        <div class="graph_box">
            <canvas id="grades"></canvas>
        </div>
    </div>
    @else
        <div class="grade_none">
            <p class="img"><img src="/images/icon/icon_none.png" /></p>
            <p class="text">暂无内容</p>
        </div>
    @endif
</div>
@if($status['code'] == 'fail')
<div class="blank_bg">
    <div class="pay_tip">
        <h3>温馨提醒</h3>
        <p>{{ $status['msg'] }}</p>
        <a class="btn" href="{{ url('/order/buy',['id' => $student->id]) }}">去付费</a>
    </div>
</div>
<script>
    $(".grade_type_cc ul li").bind('click',function(){

        $(".blank_bg").show();

        return false;
    });
</script>
@endif
@include('layout.footer')
@if(isset($firstScores))
<script type="text/javascript" src="/js/Chart.js"></script>
<script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

    var x = [
            @foreach($total_name as $item)
        "{{ $item }}",
            @endforeach
    ];
    var y1 = [
        @foreach($totals as $value)
        {{ $value }},
            @endforeach
    ];
    var config1 = ['rgba(151,187,205,0.2)','rgba(151,187,205,1)','rgba(151,187,205,1)','#fff','#fff','rgba(151,187,205,1)'];


    cart('grades',x,y1,config1);

    function cart(id,x , y,config)
    {
        this.fillColor = config[0];
        this.strokeColor = config[1];
        this.pointColor = config[2];
        this.pointStrokeColor = config[3];
        this.pointHighlightFill = config[4];
        this.pointHighlightStroke = config[5];
        var lineCharData = {
            labels : x,
            datasets:[
                {
                    fillColor : this.fillColor,
                    strokeColor : this.strokeColor,
                    pointColor : this.pointColor,
                    pointStrokeColor : this.pointStrokeColor,
                    pointHighlightFill : this.pointHighlightFill,
                    pointHighlightStroke : this.pointHighlightStroke,
                    data : y
                }
            ]
        };

        var ctx = document.getElementById(id).getContext("2d");
        window.myLine = new Chart(ctx).Line(lineCharData, {
            responsive: true
        });
    }
</script>
@endif
</body>
</html>