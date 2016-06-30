<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>403/您没有权限访问</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Simplify -->
    <link href="/css/simplify.min.css" rel="stylesheet">
</head>

<body class="overflow-hidden light-background">
<div class="wrapper no-navigation preload">
    <div class="error-wrapper">
        <div class="error-inner">
            <div class="error-type">403</div>
            <h1>权限认证失败</h1>
            <p>看起来像你要找的页面不能让你访问。再次输入地址或从主页开始。</p>
            <div class="m-top-md">
                <a href="{{ url('/admin') }}" class="btn btn-default btn-lg text-upper">返回管理中心首页</a>
            </div>
        </div><!-- ./error-inner -->
    </div><!-- ./error-wrapper -->
</div><!-- /wrapper -->


<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery -->
<script src="/js/jquery-1.11.1.min.js"></script>
<!-- Bootstrap -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src='/js/jquery.slimscroll.min.js'></script>
<!-- Simplify -->
<script src="/js/simplify/simplify.js"></script>
<script>
    $(function()	{
        setTimeout(function() {
            $('.error-type').addClass('animated');
        },100);
    });
</script>
</body>
</html>
