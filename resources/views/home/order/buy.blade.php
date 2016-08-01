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
</head>
<body>
<style>
    .recharge{ padding: 2rem;}
    .recharge_title{ line-height: 3rem; color: #FAA951; border-bottom: .1rem solid #ddd; margin: 2rem 2rem 0;}
    .recharge label{ display: block; width: 50%; margin-bottom: 2rem; position: relative; float: left; box-sizing: border-box; padding: 0 2rem; border-right: .1rem solid #ddd;}
    .recharge label:nth-child(2n){ border: none;}
    .recharge span{ line-height: 3rem;}
    .recharge i{ position: relative; width: 1.6rem; height: 1.6rem; background: none; border: .1rem solid #ddd; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%; float: left; margin-top: .7rem; margin-right: .5rem;}
    .recharge input[type=radio]{ width: 1.6rem; height: 1.6rem; position: absolute; left: 0; top: .7rem; opacity: 0; }
    .recharge label b{position: absolute; left: 50%; top: 50%; margin-left: -.5rem; margin-top: -.5rem; width: 1rem; height: 1rem; border-radius: 50%; -webkit-border-radius: 50%; -moz-border-radius: 50%; background: #FAA951; display: none;}
    .recharge label.cur b{ display: inline-block;}
    .give_btn input{width: 100%; border: none; color: #fff; background: #00BEFF; border-radius: .3rem; -moz-border-radius: .3rem; -webkit-border-radius: .3rem; height: 5rem; font-size: 2rem;}
</style>
<p class="recharge_title">选择付费</p>
<div class="recharge">
    <form id="recharge_form" method="post" action="{{ url('/order/buy') }}">
        {!! csrf_field() !!}
        <label class="cur"><input type="radio" value="0.01" name="total" checked /><i><b></b></i><span>30元/3个月</span></label>
        <label><input type="radio" value="60" name="total" /><i><b></b></i><span>60元/6个月</span></label>
        <label><input type="radio" name="total" value="120" /><i><b></b></i><span>120元/12个月</span></label>
        <div class="give_btn"><input type="submit" value="确认付款"></div>
        <input type="hidden" name="student_id" value="{{ $student->id }}">
    </form>
</div>
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript">
    $("label").click(function(){
        $(this).addClass("cur").siblings().removeClass("cur");
    })
</script>
</body>
</html>