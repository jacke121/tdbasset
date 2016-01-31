<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="{{asset('/css/personal center.css')}}">
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
    @section('header')
    <script type="text/javascript">
    $(document).ready(function(){
    setindex("cen_info");});
    </script>
    @show
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
<!--会员首页-->
        @section('content')
        <div class="mainr">
            <div class="main_wei">
		        <h3>会员首页</h3>
		        <div class="main_weicon">
		            <table cellspacing="0">
		                        <tbody><tr>
		                           <td>尊敬的：</td>
		                           <td>用户，您好！</td>
		                           <td></td>
		                        </tr>
		                        <tr>
		                            <td>目前有：</td>
		                            <td><span class="weinum">0</span>条系统未读消息</td>
		                            <td><a href="#" class="weia">立即查看 &gt; </a></td>
		                        </tr>
		                        <tr>
		                            <td></td>
		                            <td><span class="weinum">0</span>条已申请信息</td>
		                            <td><a href="#" class="weia">立即查看 &gt; </a></td>
		                        </tr>
		                        <tr>
		                            <td></td>
		                            <td><span class="weinum">快去看看吧!!!</span></td>
		                            <td></td>
		                        </tr>
		            </tbody></table>
		        </div>
		    </div>
        </div>
</div></div>
    @show
    <div style="clear:both;"></div>
<!--foot部分-->
@include('themes.default.foot')
</body>
</html>
