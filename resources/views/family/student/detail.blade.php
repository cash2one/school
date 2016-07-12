<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>总成绩单</title>
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
    <div class="grade_box">
        <ul>
            @foreach($firstScores as $score)
                @if($student->id == $score->student_id)
                    <li>
                        <a href="grade_subject.html">
                            <p class="grade_num">{{ $score->val }}</p>
                            <p class="grade_subject">{{ $score->course->name }}</p>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="agg">
        <ul>
            <li><span>总分：{{ $firstTotal }}</span></li>
            <li><span>班级排名：{{ $firstSort }}</span></li>
            <li><span>年级排名：暂无</span></li>
        </ul>
    </div>
    <style>

    </style>
    <div class="graph_title"><span></span>学情分析
        <ul  class="graph_type">
            <li><a href="#"><i></i>分数</a></li>
            <li><a href="#"><i></i>班级排名</a></li>
            <li><a href="#"><i></i>年级排名</a></li>
        </ul>
    </div>
    <div class="graph">
        <div class="graph_box">
            <canvas id="grades"></canvas>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/Chart.js"></script>

<script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

    var x = [
            @foreach($total_name as $item)
        "{{ $item }}",
            @endforeach
    ];
    var y1 = [
        @foreach($total as $value)
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

</body>
</html>