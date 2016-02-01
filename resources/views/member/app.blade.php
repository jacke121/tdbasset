<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>会员中心</title>
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/index.css') }}">

	<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/zq.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/personal center.css')}}">
	<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>

</head>
<body>

    @include('themes.default.top')

	<div class="banner">
		<img src="{{asset('/')}}images/register—_gg.jpg">
	</div>
	<!--main-->
	<div class="maincon">
		<div class="center">
			    @include('member.left_nav')
				<div class="mainr">
                      @yield('modules')
				</div>
			<div style="clear:both;"></div>
		</div>
	</div>

	@include('themes.default.foot')
	<!-- Scripts -->
</body>
</html>
