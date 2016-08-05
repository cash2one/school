//gotop
$(document).ready(function () {
    var headHeight = 300;
    var nav = $(".gotop");
    $(window).scroll(function () {
        if ($(this).scrollTop() > headHeight)
        {
            $('.gotop').fadeIn(500);
        }
        else {
            $('.gotop').fadeOut(500);
        }
    });
});
function gotoTop(acceleration,stime) {
    acceleration = acceleration || 0.1;
    stime = stime || 10;
    var x1 = 0;
    var y1 = 0;
    var x2 = 0;
    var y2 = 0;
    var x3 = 0;
    var y3 = 0;
    if (document.documentElement) {
        x1 = document.documentElement.scrollLeft || 0;
        y1 = document.documentElement.scrollTop || 0;
    }
    if (document.body) {
        x2 = document.body.scrollLeft || 0;
        y2 = document.body.scrollTop || 0;
    }
    var x3 = window.scrollX || 0;
    var y3 = window.scrollY || 0;

    // 滚动条到页面顶部的水平距离
    var x = Math.max(x1, Math.max(x2, x3));
    // 滚动条到页面顶部的垂直距离
    var y = Math.max(y1, Math.max(y2, y3));

    // 滚动距离 = 目前距离 / 速度, 因为距离原来越小, 速度是大于 1 的数, 所以滚动距离会越来越小
    var speeding = 1 + acceleration;
    window.scrollTo(Math.floor(x / speeding), Math.floor(y / speeding));

    // 如果距离不为零, 继续调用函数
    if(x > 0 || y > 0) {
        var run = "gotoTop(" + acceleration + ", " + stime + ")";
        window.setTimeout(run, stime);
    }
}
//商品列表 收藏、预约按钮显示隐藏
$(".show").click(function(){
    var sign = $(this).parents("li").find(".sign");
    if(sign.css('display') == 'none')
    {
        sign.slideDown();
        $(this).parents("li").siblings('li').find('.sign').slideUp();
        return true;
    }
    else
    {
        sign.slideUp();
    }
});
//限时购倒计时
function timer(dom){

    var intDiff = dom.attr('data-end-time');

    window.setInterval(function(){
        var day=0,
            hour=0,
            minute=0,
            second=0;//时间默认值
        if(intDiff > 0){
            day = Math.floor(intDiff / (60 * 60 * 24));
            hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
            minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
            second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
        }
        if (hour <= 9) hour = '0' + hour;
        if (minute <= 9) minute = '0' + minute;
        if (second <= 9) second = '0' + second;
        dom.find(".day_show").html(day+"天");
        dom.find('.hour_show').html('<s></s>'+hour+':');
        dom.find('.minute_show').html('<s></s>'+minute+':');
        dom.find('.second_show').html('<s></s>'+second);
        intDiff--;
    }, 1000);
}
$(function(){
    //var intDiff = parseInt(600);//倒计时总秒数量
    var dataTime = $('.dataTime');
    dataTime.each(function(){
        timer($(this));
    });
});
//头部搜索类型选择
$(".sel_type").click(function(){
    var shower = $(this).children("ul");
    if(shower.css('display') == 'none')
    {
        shower.slideDown();
        return true;
    }
    else
    {
        shower.slideUp();
    }
});