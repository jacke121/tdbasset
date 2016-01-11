<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=gbk">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{ asset('/plugin/jquery-1.9.1.js ') }}"></script>
    <script type="text/javascript">
    function setindex(id) {
    //设置button效果，开始计时
    $("#ulback").find("li").attr('class','');
    $("#"+id).attr("class", "cur");
    }
    </script>
	<!-- Fonts -->
<!--	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>-->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <style>
        .table-top{
            margin-top: 20px;
        }
        .btn_form{
           float: right;
            margin-right: 5px;
        }
        li.cur a{
            font-weight:bold
        }
    </style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul id="ulback" class="nav navbar-nav">
					<li id="lihome"><a href="{{URL::route('backend.home.index')}}">后台主页</a></li>
					<li id="licontent" class="cur"><a href="{{URL::route('backend.content.index')}}">内容管理</a></li>
					<li id="lisystem"><a href="{{ url('/backend/system/index') }}">系统设置</a></li>
                    <li id="liauthe"><a href="{{ url('/backend/authe/index') }}">会员审批</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/backend/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/backend/auth/register') }}">Register</a></li>
					@else
                        <li><a href="/">网站主页</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->get()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/backend/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

    @yield('modules')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
