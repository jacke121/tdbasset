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
<!--安全中心-->
        <div class="mainr">
    <div class="main_anquan">
        <h3 class="main_anquan">个人用户认证</h3>
       	<p class="an_list list_spe"><span class="listtit">用户名：</span>fjsaklfj</p>
       	<p class="an_list"><span class="listtit">手机认证：</span>123456789<a href="javascript:void(0);" class="lista phonex">修改</a></p>
       	<div class="phonecon" style="display: none;">
       	<!-- 第一步 -->
       	<div class="phonecon1">
			 <table cellspacing="0" class="tabletit1">
			    <tbody><tr>
			      <td class="tdspe">验证原手机号码</td>
			      <td>验证新手机号码</td>
			      <td>成功</td>
			    </tr>
			  </tbody></table>
			  <img src="../images/anquan1.png">
			  <div class="int">
                    <span class="intspan">原手机号码</span>
                    <input type="text" value="123456789" readonly>
                    <span class="code">获取验证码</span>
                    <span class="code1">59s后重新发送</span>
                    <span class="ts"></span>
              </div>
              <div class="int">
                    <span class="intspan">短信验证码</span>
                    <input type="text">
                    <span class="ts"></span>
              </div>
              <p class="phonestep1">
                <a href="#" class="phone1btn">下一步</a>
              </p>
        </div>
        <!-- 第二步 -->
       	<div class="phonecon2">
			 <table cellspacing="0" class="tabletit1">
			    <tbody><tr>
			      <td class="tdspe">验证新手机号码</td>
			      <td class="tdspe">验证新手机号码</td>
			      <td>成功</td>
			    </tr>
			  </tbody></table>
			  <img src="../images/anquan2.png">
			  <div class="int">
                    <span class="intspan">新手机号码</span>
                    <input type="text">
                    <span class="code">获取验证码</span>
                    <span class="code1">59s后重新发送</span>
                    <span class="ts"></span>
              </div>
              <div class="int">
                    <span class="intspan">短信验证码</span>
                    <input type="text">
                    <span class="ts"></span>
              </div>
              <p class="phonestep1">
                <a href="#" class="phone2btn">下一步</a>
              </p>
        </div>
        <!-- 第三步 -->
       	<div class="phonecon3">
			 <table cellspacing="0" class="tabletit1">
			    <tbody><tr>
			      <td class="tdspe">验证原手机号码</td>
			      <td class="tdspe" bgcolor="">验证新手机号码</td>
			      <td class="tdspe">成功</td>
			    </tr>
			  </tbody></table>
			  <img src="../images/anquan3.png">
			  <p class="phone3p">恭喜您成功认证新手机！！！</p>
        </div>
			  <div class="bgbg">
			  <span class="bgts">温馨提示</span>
<p>1.请填写真实有效的手机号，手机号将作为验证用户身份发重要手段。</p>
<p>2.青苔债管家会对用户的所有资料进行严格保密。</p>
<p>3.手机认证过程遇到问题，请联系客服 000-111-222</p>
			  </div>
       	</div>
       	<p class="an_list list_spe"><span class="listtit">登录密码：</span>已设置<a href="javascript:void(0);" class="lista pwdx">修改</a></p>
       	<div class="pwdcon" style="display: none;">
       	<!-- 第一步 -->
       	<div class="pwdcon1">
			  <div class="int">
                    <span class="intspan">原登录密码</span>
                    <input type="password">
                    <span class="ts"></span>
              </div>
              <div class="int">
                    <span class="intspan">新登录密码</span>
                    <input type="password">
                    <span class="ts"></span>
              </div>
              <div class="int">
                    <span class="intspan">再次输入新登录密码</span>
                    <input type="password">
                    <span class="ts"></span>
              </div>
              <p class="phonestep1">
                <a href="#" class="pwd1btn">修改登录密码</a>
              </p>
        </div>
        <!-- 第二步 -->
       	<div class="pwdcon2">
			  恭喜您成功修改登录密码！！！
        </div>
      			<div class="bgbg">
			  <span class="bgts">温馨提示</span>
<p>1请牢记您设置的新密码，登录密码可通过密码找回功能找回。</p>
<p>2.邮箱认证过程遇到问题，请联系客服 000-111-222</p>
			  </div>
       	</div>
       	<p class="an_list" style="display: none;"><span class="listtit">邮箱认证：</span>已设置<a href="javascript:void(0);" class="lista emailx">修改</a></p>
       	<div class="emailcon">
       	<!-- 第一步 -->
       	<div class="emailcon1">
			  <div class="int">
                    <span class="intspan">原邮箱地址</span>
                    <input type="text" value="" readonly>
                    <span class="ts"></span>
              </div>
              <div class="int">
                    <span class="intspan">新邮箱地址</span>
                    <input type="text">
                    <span class="ts"></span>
              </div>
              <p class="phonestep1">
                <a href="#" class="emailbtn">发送验证邮件</a>
              </p>
        </div>
      			<div class="bgbg">
			  <span class="bgts">温馨提示</span>
<p>1.请填写真实有效的邮箱地址，您可以通过邮箱进行找回密码等功能。</p>
<p>2.青苔债管家会对用户的所有资料进行严格保密。</p>
<p>3.邮箱认证过程遇到问题，请联系客服 000-111-222</p>
			  </div>
       	</div>
     <!-- 弹出层-->
    <div class="tan" style="display:none;">
        <p class="tants">激活成功！</p>
        <p class="tants1">
        已成功发送验证邮件到您的新邮箱，<br>
    请在24小时内进入新邮箱激活。
         </p><p class="tanp">
         <input type="submit" class="tanbtn" value="确认">
         </p>
    </div>
       	<p class="an_list"><span class="listtit">资格认证：</span>
       			未提交认证申请
        </p>
    </div>
    </div>
        <div style="clear:both;"></div>


    
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
