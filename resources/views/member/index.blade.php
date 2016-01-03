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
<!--会员首页-->
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
        <div style="clear:both;"></div>
<!--系统消息-->
	<div class="mainr" style="display:none;">
        <div class="ser_wei">
            <h3>系统消息</h3>
              <input type="hidden" value="1">
              <input type="hidden" value="1">
              <input type="hidden" value="1">
            <div class="ser_weicon" style="display: none;">
               <p> 亲、目前暂无任何系统信息！<br>再去<a href="index.html">首页</a>转转吧~</p>
            </div>
            <div class="wei_table" id="openTable">
               <table>
                    <tbody>
                        <tr class="tabletit">
                           <td>时间</td>
                           <td>消息名称</td>
                           <td>内容</td>
                           <td>操作</td>
                        </tr>
                         <tr class="tcur" id="tr0" style="color: gray;">
                            <td>2015-11-27</td>
                            <td><span>【注册信息】</span></td>
                            <td><p class="content">欢迎您成为投贷宝的临时会员，请牢记您的登录账号：用户名;请进行资质认证成为正式会员参与平台投标服务哦</p></td>
                            <td><a href="javascript:void(0);" class="look">查看</a><a href="javaScript:void(0)" class="del">删除消息</a></td>
                        </tr>
                    </tbody>
                </table>
                <div id="pager">
                    <ul class="pages">
                        <li class="lispe" id="pageCountInfo">共1条记录  第1/1页</li>
                        <li class="pg下一页 pgEmpty">首页</li>
                        <li class="pg下一页 pgEmpty">上一页</li>
                        <li class="page-number pgCurrent">1</li>
                        <li class="pg下一页 pgEmpty">下一页</li>
                        <li class="pg下一页 pgEmpty">尾页</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
<!--已申请信息-->
        <div class="mainr" style="display:none;">    
            <div class="ser_wei">
                <h3>查看已申请信息</h3>
                <ul class="chaul">
                    <li class="chaul1"><span class="icon"></span><span class="text">银行资产包</span></li>
                    <li class="chaul2 chaulg"><span class="icon"></span><span class="text">个人债务宝</span></li>
                    <li class="chaul3 chaulg"><span class="icon"></span><span class="text">企业商帐通</span></li>
                    <li class="chaul4 chaulg"><span class="icon"></span><span class="text">判决执行宝</span></li>
                </ul>
                <div class="wei_table">
                   <table>
                       <tbody>
                           <tr>
                               <td colspan="7" align="center">暂无数据！</td>
                           </tr>
                       </tbody>
                   </table>
                   <div id="pager"></div>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
<!--已收藏信息-->    
    <div class="mainr" style="display:none;">
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
    <div style="clear:both;"></div>
<!--资格认证-->
        <div class="mainr" style="display:none;">
            <div class="fa_ren">
                <h3 class="fa_renh">资格认证</h3>
                <div class="fa_rencon">
                    <div class="renlist ml1" id="lawyerId">
                    <h3>律师用户认证</h3>
                    <img src="../images/lsrz.png" width="110px" height="110px">
                    <p>未提交认证申请</p>
                    <input type="hidden" id="lawyerAuth" value="0">
                    </div>
                    <div class="renlist ml2" id="orgId">
                    <h3>企业用户认证</h3>
                    <img src="../images/qyrz.png" width="110px" height="110px">
                    <p>未提交认证申请</p>
                    <input type="hidden" id="orgAuth" value="0">
                    </div>
                    <div class="renlist ml3" id="orgId">
                    <h3>个人用户认证</h3>
                    <img src="../images/qyrz.png" width="110px" height="110px">
                    <p>未提交认证申请</p>
                    <input type="hidden" id="orgAuth" value="0">
                    </div>
                </div>
            </div>
            <br>
<!--律师用户认证的详情页面-->    
        <div class="mainr">
        <div class="fa_ren">
        <h3 class="fa_renh">律师用户认证</h3>
        <div class="fa_rencon">
            <p class="renper_p">完成用户认证后，您可在平台参与投标。</p>
            <p class="renper_p">以下所录入信息仅作为平台审核认证使用，不会造成您个人信息的泄露</p>
            <table class="tableper">
                <tbody><tr>
                  <td class="tdl">律师姓名</td>
                  <td class="tdr"><input type="text" class="int1" id="dlfmc"></td>
                </tr>
                <tr>
                  <td class="tdl">所在地</td>
                  <td class="tdr">
    				 <select name="zq_province" class="pubsel"><option value="省份" selected>省份</option><option value="北京市">北京市</option><option value="天津市">天津市</option></select>&nbsp;&nbsp;
		    		 <select name="zq_city" class="pubsel"><option value="地级市">地级市</option></select>&nbsp;&nbsp;
		   			 <select name="zq_county" class="pubsel"><option value="市、县级市">市、县级市</option></select>
                </td>
                </tr>
                <tr>
                  <td class="tdl">律师执业证编码</td>
                  <td class="tdr"><input type="text" class="int1"></td>
                </tr>
                <tr>
                  <td class="tdl">所在律师所</td>
                  <td class="tdr"><input type="text" class="int1"></td>
                </tr>
                <tr>
                  <td class="tdl">上传执照资格证书</td>
				<td class="tdr">
	<form method="post" enctype="multipart/form-data">
                    <div class="upload_box">
                        <div class="upload_main">
                            <div class="upload_choose">
                                <input type="file" size="30">                              
                            </div>
                            <div class="upload_preview"></div>
                        </div>
                        <input type="hidden" name="pjcsbs">
                        <div class="upload_submit">
                            <!-- <button type="button" id="fileSubmit" class="upload_submit_btn">确认上传图片</button> -->
                        </div>
                        <div class="upload_inf"></div>
                    </div>
                </form>
				</td>
			</tr>
			<tr>
				<td class="tdl" style="font: red">提示：</td>
				<td class="tdr">证书上的所有信息清晰可见，必须能看得清证件号。<br>
				照片内容真实有效，不得做任何修改。<br>
				支持：jpg、jpeg、 bmp、 png格式照片，大小不得超过2M。
				</td>
			</tr>
			
                <tr>
                  <td class="tdl">联系邮箱</td>
                  <td class="tdr"><input type="text" class="int1"></td>
                </tr>
                <tr>
                  <td class="tdl"></td>
                  <td class="tdr"><input type="submit" class="reg2btn" value="立即认证"></td>
                </tr>
            </tbody></table>
        </div>
    </div>
<!-- 弹出层-->
    <div class="tan" style="display:none;">
	     <p class="tan_icon">
	     	<span class="dui" style="display: none;"></span>
	     	<span class="cuo"></span>
	     </p>
     	<p class="tants" id="alertInfo" style="display: block;">您的认证信息已提交,我们会在一个工作小时内为您完成审核</p>
	 	<p class="tanp">
    		 <input type="submit" class="tanbtn" value="确认">
     	</p>
    </div>
</div>
        <div style="clear:both;"></div>
<!--企业用户认证的详情页面-->
        <div class="mainr">
<div class="fa_ren">
	<h3 class="fa_renh">企业用户认证</h3>
	<div class="fa_rencon">
		<table cellspacing="0" class="tableper">
			<tbody><tr>
				<td class="tdl">企业名称</td>
				<td class="tdr"><input type="text" class="int1"></td>
			</tr>
			<tr>
				<td class="tdl">证件号</td>
				<td class="tdr"><input type="text" class="int1"></td>
			</tr>
			<tr>
				<td class="tdl">所在地</td>
				<td class="tdr">
					<select name="zq_province" class="pubsel"><option value="省份">省份</option><option value="北京市">北京市</option><option value="天津市">天津市</option></select>&nbsp;&nbsp;
		    		 <select name="zq_city" class="pubsel"><option value="地级市">地级市</option></select>&nbsp;&nbsp;
		   			 <select name="zq_county" class="pubsel"><option value="市、县级市">市、县级市</option></select>
				</td>
			</tr>
			<tr>
				<td class="tdl">上传营业执照</td>
				<td class="tdr">
				<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="upload_box">
                        <div class="upload_main">
                            <div class="upload_choose">
                                <input type="file" size="30" name="fileselect[]" multiple>                              
                            </div>
                            <div class="upload_preview"></div>
                        </div>
                        <input type="hidden" name="pjcsbs" value="">
                        <div class="upload_submit">
                            <!-- <button type="button" class="upload_submit_btn">确认上传图片</button> -->
                        </div>
                        <div class="upload_inf"></div>
                    </div>
                </form>
                </td>
			</tr>
			<tr>
				<td class="tdl">提示：</td>
				<td class="tdr">工商营业执照必须在有效期范围内。<br>
					格式要求：原件照片、扫描或复印件加盖企业公章后扫描件。<br>
					支持：jpg、jpeg、 bmp、 png格式照片，大小不得超过2M。<br>
					<font color="red">营业执照上的所有信息清晰可见，手持证件人的五官清晰可见，照片内容真实有效，不得做任何修改</font>
				</td>
			</tr>
			<tr>
				<td class="tdl">法定代表人姓名</td>
				<td class="tdr"><input type="text" class="int1"></td>
			</tr>
			<tr>
				<td class="tdl">企业规模</td>
				<td class="tdr"><input type="text" class="int1">人</td>
			</tr>
			<tr>
				<td class="tdl">联系邮箱</td>
				<td class="tdr"><input type="text" class="int1"></td>
			</tr>
			<tr>
				<td class="tdl"></td>
				<td class="tdr"><input type="submit" class="reg2btn" value="立即认证" onclick="submitQyAuth()"></td>
			</tr>
		</tbody></table>
	</div>
</div>
<!-- 弹出层-->
        <div class="tan" style="display:none;">
            <p class="tan_icon">
            <span class="dui" style="display: none;"></span>
            <span class="cuo"></span>
            </p>
            <p class="tants" id="alertInfo" style="display: block;">您的认证信息已提交,我们会在一个工作小时内为您完成审核</p>
            <p class="tanp">
            <input type="submit" class="tanbtn" value="确认">
            </p>
        </div>
    </div>
    <div style="clear:both;"></div>
<!--个人用户认证的详情页面-->
        <div class="mainr">
<div class="fa_ren">
	<h3 class="fa_renh">个人用户认证</h3>
	<div class="fa_rencon">
		<table cellspacing="0" class="tableper">
			<tbody><tr>
				<td class="tdl">姓名</td>
				<td class="tdr"><input type="text" class="int1"></td>
			</tr>
			<tr>
				<td class="tdl">证件号</td>
				<td class="tdr"><input type="text" class="int1"></td>
			</tr>
			<tr>
				<td class="tdl">所在地</td>
				<td class="tdr">
					<select name="zq_province" class="pubsel"><option value="省份">省份</option><option value="北京市">北京市</option><option value="天津市">天津市</option></select>&nbsp;&nbsp;
		    		 <select name="zq_city" class="pubsel"><option value="地级市">地级市</option></select>&nbsp;&nbsp;
		   			 <select name="zq_county" class="pubsel"><option value="市、县级市">市、县级市</option></select>
				</td>
			</tr>
			<tr>
				<td class="tdl">上传证件照片</td>
				<td class="tdr">
				<form method="post" enctype="multipart/form-data">
                    <div class="upload_box">
                        <div class="upload_main">
                            <div class="upload_choose">
                                <input type="file" size="30" name="fileselect[]" multiple>                              
                            </div>
                            <div class="upload_preview"></div>
                        </div>
                        <input type="hidden" name="pjcsbs" value="">
                        <div class="upload_submit">
                            <!-- <button type="button" class="upload_submit_btn">确认上传图片</button> -->
                        </div>
                        <div class="upload_inf"></div>
                    </div>
                </form>
                </td>
			</tr>
			<tr>
				<td class="tdl">提示：</td>
				<td class="tdr">证件照必须在有效期范围内。<br>
					格式要求：原件照片、扫描或复印件。<br>
					支持：jpg、jpeg、 bmp、 png格式照片，大小不得超过2M。<br>
					<font color="red">证件照上的所有信息清晰可见，手持证件人的五官清晰可见，照片内容真实有效，不得做任何修改</font>
				</td>
			</tr>
			<tr>
				<td class="tdl">联系邮箱</td>
				<td class="tdr"><input type="text" class="int1"></td>
			</tr>
			<tr>
				<td class="tdl"></td>
				<td class="tdr"><input type="submit" class="reg2btn" value="立即认证" onclick="submitQyAuth()"></td>
			</tr>
		</tbody></table>
	</div>
</div>
<!-- 弹出层-->
        <div class="tan" style="display:none;">
            <p class="tan_icon">
            <span class="dui" style="display: none;"></span>
            <span class="cuo"></span>
            </p>
            <p class="tants" id="alertInfo" style="display: block;">您的认证信息已提交,我们会在一个工作小时内为您完成审核</p>
            <p class="tanp">
            <input type="submit" class="tanbtn" value="确认">
            </p>
        </div>
    </div>
    <div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
<!--安全中心-->
        <div class="mainr" style="display:none;">
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
@include('themes.default.foot')
</body>
</html>
