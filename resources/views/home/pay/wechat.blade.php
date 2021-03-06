<!DOCTYPE html >
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <title>家长评价</title>
    <link rel="stylesheet" type="text/css" href="/css/common.css" >
</head>
<body>
<style>
    .give{ padding: 2rem;}
    .give .logo{ width: 10rem; height: 10rem; margin: 3rem auto;}
    .give p{ line-height: 1.8rem; padding: 2rem 0; border-bottom: .1rem dashed #ddd;}
    .give p span{ float: right;}
    .give i{ font-size: 2.4rem; color: #FAA951; font-style: normal; margin-right: .5rem;}
    .give .give_btn{ margin-top: 5rem;}
    .give .give_btn input{width: 100%; border: none; color: #fff; background: #00BEFF; border-radius: .3rem; -moz-border-radius: .3rem; -webkit-border-radius: .3rem; height: 5rem; font-size: 2rem;}
</style>
<div class="give">
    <div class="logo"><img src="/images/icon/logo2.png" /></div>
    <p>对象：<span>{{ $order->student->name }}</span></p>
    <p>费用：<span><i>{{ $order->total }}</i>元</span></p>
    <p>支付方式：<span>微信支付</span></p>
    <div class="give_btn"><input type="submit" value="确认付款" onclick="WXPayment()" /></div>
</div>
<script language="javascript" type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript">
    var WXPayment = function() {
        if( typeof WeixinJSBridge === 'undefined' ) {
            alert('请在微信在打开页面！');
            return false;
        }
        WeixinJSBridge.invoke(
                'getBrandWCPayRequest', <?php echo $json; ?>, function(res) {
                    switch(res.err_msg) {
                        case 'get_brand_wcpay_request:cancel':
                            alert('您取消了支付！');
                            break;
                        case 'get_brand_wcpay_request:fail':
                            alert('支付失败！（'+res.err_desc+'）');
                            break;
                        case 'get_brand_wcpay_request:ok':
                            alert('支付成功！');
                            window.location.href = '/pay/status/'+'{{ $order->id }}'
                            break;
                        default:
                            alert(JSON.stringify(res));
                            break;
                    }
                });
    }
</script>
</body>
</html>