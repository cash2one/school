<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>口袋家校</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=device-dpi" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- ionicons -->
    <link href="/css/ionicons.min.css" rel="stylesheet">
    <!-- Simplify -->
    <link href="/css/simplify.min.css" rel="stylesheet">

</head>
<body class="overflow-hidden light-background">
<div class="wrapper no-navigation preload">
    <div class="sign-in-wrapper">
        <div class="sign-in-inner">
            <div class="login-brand text-center">
                <i class="fa fa-database m-right-xs"></i><strong class="text-skin">口袋家校</strong> 管理后台
            </div>
            <form method="post" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group m-bottom-md">
                    <input type="text" name="email" class="form-control" placeholder="账户">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="密码">
                </div>
                <div class="form-group">
                    <div class="custom-checkbox">
                        <input type="checkbox" name="remember" id="chkRemember">
                        <label for="chkRemember"></label>
                    </div>
                    记住帐号
                </div>
                <div class="m-top-md p-top-sm">
                    <button class="btn btn-success btn-block">登录</button>
                </div>
            </form>
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="btn btn-success">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div><!-- ./sign-in-inner -->
    </div><!-- ./sign-in-wrapper -->
</div><!-- /wrapper -->
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Jquery -->
<script src="/js/jquery-1.11.1.min.js"></script>
</body>
</html>
