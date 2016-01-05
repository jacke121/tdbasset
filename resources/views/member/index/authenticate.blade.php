<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="{{asset('/css/personal center.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
</head>

<body>
    @include('themes.default.top')
<!--main-->
    <div class="maincon">
        @include('member.left_nav')
<!--资格认证-->
        <div class="mainr" >
            <div class="fa_ren">
                <h3 class="fa_renh">资格认证</h3>
                <div class="fa_rencon">
                    <div class="renlist ml1" id="lawyerId">
                    <h3>律师用户认证</h3>
                    <img src="{{ asset('/images/lsrz.png')}}" width="110px" height="110px">
                    <p>未提交认证申请</p>
                    <input type="hidden" id="lawyerAuth" value="0">
                    </div>
                    <div class="renlist ml2" id="orgId">
                    <h3>企业用户认证</h3>
                    <img src="{{ asset('images/qyrz.png')}}" width="110px" height="110px">
                    <p>未提交认证申请</p>
                    <input type="hidden" id="orgAuth" value="0">
                    </div>
                    <div class="renlist ml3" id="orgId">
                    <h3>个人用户认证</h3>
                    <img src="{{ asset('images/qyrz.png')}}" width="110px" height="110px">
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
        </div>
        <div style="clear:both;"></div>
<!--foot部分-->
  @include('themes.default.foot')
</body>
</html>
