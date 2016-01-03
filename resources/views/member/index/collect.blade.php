

    <!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="{{asset('/css/personal center.css')}}">
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
</head>

<body>
    @include('themes.default.top')
<!--main-->
    <div class="maincon">
        @include('member.left_nav')
<!--系统消息-->
	    <div class="mainr">
        <div class="ser_wei">
            <h3>查看已收藏信息</h3>
            <ul class="chaul">
                <li class="chaul1"><span class="icon"></span><span class="text">银行资产包</span></li>
                <li class="chaul2 chaulg"><span class="icon"></span><span class="text">个人债务宝</span></li>
                <li class="chaul3 chaulg"><span class="icon"></span><span class="text">企业商帐通</span></li>
                <li class="chaul4 chaulg"><span class="icon"></span><span class="text">判决执行宝</span></li>
            </ul>
            <div class="wei_table">
            <table>
            </table>
            <div id="pager"></div>
        </div>
        </div>
    </div>
</div>
  <div style="clear:both;"></div>
<!--foot部分-->
@include('themes.default.foot')
</body>
</html>
