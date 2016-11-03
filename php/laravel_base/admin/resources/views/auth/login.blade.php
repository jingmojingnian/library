<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Custom Theme">
        <!-- END META -->

        <!-- BEGIN SHORTCUT ICON -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <!-- END SHORTCUT ICON -->
        <title>登陆 - {{ config('app.name') }}</title>
        <!-- BEGIN STYLESHEET-->
        <link href="{{ config('url.styles') }}/css/bootstrap.min.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
        <link href="{{ config('url.styles') }}/css/bootstrap-reset.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
        <link href="{{ config('url.styles') }}/assets/font-awesome/css/font-awesome.css" rel="stylesheet"><!-- FONT AWESOME ICON CSS -->
        <link href="{{ config('url.styles') }}/css/style.css" rel="stylesheet"><!-- THEME BASIC CSS -->
        <link href="{{ config('url.styles') }}/css/style-responsive.css" rel="stylesheet"><!-- THEME RESPONSIVE CSS -->
        <!--[if lt IE 9]>
    <script src="js/html5shiv.js">
    </script>
    <script src="js/respond.min.js">
    </script>
    <![endif]-->
        <!-- END STYLESHEET-->
    </head>
    <body class="login-screen">
        <!-- BEGIN SECTION -->
        <div class="container">
            {!! Form::open(['class' => 'form-signin', 'method' => 'post']) !!}
                {{ csrf_field() }}
                <h2 class="form-signin-heading">系统登陆</h2>
                <!-- LOGIN WRAPPER  -->
                <div class="login-wrap">
                    {!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => '请输入邮箱', 'autofocus' => true]) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '请输入密码']) !!}
                    <label class="checkbox">
                        {!! Form::checkbox('remember') !!}
                        记住我
                        <span class="pull-right">
                            <a data-toggle="modal" href="{{ url('/password/reset') }}">
                                忘记密码?
                            </a>
                        </span>
                    </label>
                    @include('errors._form')
                    {!! Form::submit('登 陆', ['class' => 'btn btn-lg btn-login btn-block']) !!}
                </div>
                <!-- END LOGIN WRAPPER -->
            {!! Form::close() !!}
        </div>
        <!-- END SECTION -->
        <!-- BEGIN JS -->
        <script src="{{ config('url.styles') }}/js/jquery.js" ></script><!-- BASIC JQUERY LIB. JS -->
        <script src="{{ config('url.styles') }}/js/bootstrap.min.js" ></script><!-- BOOTSTRAP JS -->
        <!-- END JS -->
    </body>
</html>