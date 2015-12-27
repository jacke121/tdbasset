<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登录</title>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
</head>

<body>
<!--top部分-->
    <div class="top">
        <div class="center">
        	<img src="../images/top_phone.jpg" width="16" height="16" style="margin-right:8px;">
            <span class="f14" style="margin-right:15px;">服务热线：</span>
            <span style="color:#ee8d0a; font-size:21px; margin-right:458px;">400-058-9555</span>
            <a href="#" class="login" style="margin-right:10px;">登录</a>
            <a href="#" class="login" style="background:#0092D7; margin-right:14px;">注册</a>
            <a href="#" class="f14" style="margin-right:15px;">个人中心</a>
            <a href="#"><img src="../images/top_qq.jpg" width="16" height="17" style="margin-right:5px;"></a>
            <a href="#"><img src="../images/top_weixin.jpg" width="18" height="17"></a>
        </div>
    </div>
<!--head部分-->
    <div class="header">
      <div class="center">
        	<ul class="center_left">
            	<li style="margin:19px 17px 0 0;"><a href="index.html"><img src="../images/head_logo.jpg" width="58" height="57"></a></li>
                <li style="margin-top:35px;"><img src="../images/head_ldzc.jpg" width="219" height="25"></li>
            </ul>
            <dl class="center_right">
            
            	<dt class="inDex"><a href="index.html" class="current">首页</a></dt>
                <dd></dd>
            	<dt><a href="#">债务大厅</a></dt>
                <dd></dd>
            	<dt><a href="#">产品服务</a></dt>
                <dd></dd>
            	<dt><a href="#">加盟合作</a></dt>
                <dd></dd>
            	<dt><a href="#">用户指南</a></dt>
                <dd></dd>
            	<dt><a href="#">关于我们</a></dt>
            </dl>
      </div>
    </div>
<!--广告位-->
	<div class="banner">
    	<img src="../images/login_ggt.jpg">
    </div>
<!--登录-->
    <div class="log">
        <div class="logcon">
            <h3 class="logtit">会员登录</h3>
            <div class="fl logl">
                <p class="logp">请仔细填写下列信息</p>
                <div class="int">
                    <span class="intface userface"></span>
                    <input type="text" placeholder="用户名" class="user" id="account" name="account">
                </div>
                <div class="int">
                    <span class="intface pwdface"></span>
                    <input type="password" placeholder="密码" class="pwd" id="pwd" name="pwd">
                </div>
                
                <p class="logtt">
                <input class="log_check" hidden="hidden" type="checkbox" checked="checked"><span hidden="hidden">一周内自动登录</span>
                <a href="#" class="lookpwd">找回密码</a>
                </p>
                <button class="logbtn" id="loginBtn" onclick="loginForm()">登录</button>
            </div>
            <div class="fr logr">
                <h3>用户登录帮助</h3>
                <p>如果您在登录前未进行会员注册，请您先进行会员注册；
请您正确填写注册的用户名和密码；如果您忘记了您的密码，可以点击‘忘记密码’找回您注册的密码。</p>
                <a href="#">免费注册</a>
            </div>
            <div style="clear:both;"></div>
        </div>
        
    </div>
<!--foot部分-->
	<div class="foot">
		<div class="footcon">
			<div class="foot1">
				<h3 class="footh3">关于某某</h3>
				<ul>
					<li><a href="#">公司简介</a></li>
					<li><a href="#">隐私规则</a></li>
					<li><a href="#">投资机构</a></li>
					<li><a href="#">人才招聘</a></li>
				</ul>
				<ul>
					<li><a href="#">产品介绍</a></li>
					<li><a href="#">联系我们</a></li>
					<li><a href="#">法律声明</a></li>
					<li><a href="#">帮助中心</a></li>
				</ul>
			</div>
			<div class="foot2">
            	<div><img src="../images/bigphone.jpg" width="38" height="58" style=" position:absolute; top:15px; left:-3px;"></div>
				<h3 class="foot4h">
					服务热线<br> <span class="foot4p1">400-058-9555</span>
				</h3>
				<p>周一到周五9:00-18:00</p>
				<p class="foot4p3">
					<div style="float:left;padding-right:5px;"><img src="../images/bigzuobiao.jpg" width="13" height="21"></div>
					企业坐标
				</p>
				<p class="foot4p4">北京市朝阳区三元西桥时间国际八号楼南区1910</p>
			</div>
			<div class="foot3">
				<h3 class="foot3h">官方微信</h3>
				<img src="../images/erweima.jpg" width="106" height="106">
			</div>
		</div>
	</div>
	<div class="footlink">
    	<div style=" height:40px; line-height:40px; padding:0 0 0 370px;">
            <a href="#">友情链接</a>
            <a href="#">百度</a>
            <a href="#">清债公司</a>
            <a href="#">清欠公司</a>
            <a href="#">思科培训</a>
        </div>
	</div>
</body>
</html>
