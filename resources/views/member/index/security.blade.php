<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="_token" content="{{ csrf_token() }}"/>
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="{{asset('/css/personal center.css')}}">
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
<script src="{{asset('/js/jquery.form.js') }}"></script>
<script type="text/javascript">

    var currentnum=1;
    function modifymobile(step) {
        if (step == 1) {
            $(".phonecon").show();
        }else if (step == 2) {
            var ajax_option={
                dataType: "json", //数据格式:JSON
                success:function(msg){
                    if(msg['State']>0){
                        alert(msg['MsgState']);
                    }else{
                        $(".phonecon1").hide();
                        $(".phonecon2").show();
                    }
                }
            }
            $('#step2').ajaxSubmit(ajax_option);
        }else if(step == 3) {

            var ajax_option={
                dataType: "json", //数据格式:JSON
                success:function(msg){
                    if(msg['State']>0){
                        alert(msg['MsgState']);
                    }else{
                        $(".phonecon2").hide();
                        $(".phonecon3").show();
                    }
                }
            }
            $('#step3').ajaxSubmit(ajax_option);
        }
    }
    $(function () {
        setindex("cen_security");
    });
    var InterValObj; //timer变量，控制时间
    var count = 15; //间隔函数，1秒执行
    var curCount;//当前剩余秒数
    function sendMessage(num) {
        currentnum=num;
       var mobile=$("#mobile").val();
        if(num==2){
            if($("#mobile").val()==$("#newmobile").val()){
                alert("手机号不能与原手机号相同");
                return;
            }
            mobile=$("#newmobile").val();
        }
        curCount = count;
        //设置button效果，开始计时
            if($('#btnSendCode'+num).hasClass('disabled')) return;
            $('#btnSendCode'+num).addClass('disabled');
            // $("#btnSendCode").attr("disabled", "true");
            $("#btnSendCode").html(curCount);//"请在" + curCount + "秒内输入验证码");
        InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
        var code="122345";
        var url="/auth/sendsms";
        $.ajax({
            type: "POST", //用POST方式传输
            url: url, //目标地址
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
            data:{type_data:"modify",mobile:mobile,msg:code
            },
            // 　　dataType: "json", //数据格式:JSON
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);
            },
            success: function (msg){
                if(msg['State']>0){
                    //有异常
                    alert(msg['MsgState']);
                    curCount=0;
                }else{
                }
            },
        });
    }
    //timer处理函数
    function SetRemainTime() {
        if (curCount == 0) {
            window.clearInterval(InterValObj);//停止计时器
                $("#btnSendCode"+currentnum).removeClass('disabled');
            // $("#btnSendCode").removeAttr("disabled");//启用按钮
            $("#btnSendCode"+currentnum).html("重新发送验证码");
        }
        else {
            curCount--;
            $("#btnSendCode"+currentnum).html(curCount);//"请在" + curCount + "秒内输入验证码");
        }
    }
</script>
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
       	<p class="an_list list_spe"><span class="listtit">用户名：{{ Auth::member()->get()->name }}</span></p>
       	<p class="an_list list_spe"><span class="listtit">手机认证：{{ Auth::member()->get()->mobile }}</span><a href="javascript:;" onclick="modifymobile(1)" class="lista
       	phonex">修改</a></p>
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
			  <img src="{{ asset('/')}}images/anquan1.png">
            {!! Form::open(['id'=>'step2','url' => '/auth/modifymobile', 'method' => 'post','class'=>'form-horizontal']) !!}
            <input type="hidden" name="step" value="2">
			  <div class="int">
                    <span class="intspan">原手机号码</span>
                    <input id="mobile" name="mobile" type="text" value="{{ Auth::member()->get()->mobile }}" readonly>
                    <span id="btnSendCode1" onclick="sendMessage(1)" class="code">获取验证码</span>
                    <span class="code1">59s后重新发送</span>
                    <span class="ts"></span>
              </div>
              <div class="int">
                    <span class="intspan">短信验证码</span>
                    <input name="checkcode" type="text">
                    <span class="ts"></span>
              </div>
              <p class="phonestep1">
                <a href="javascript:;" onclick="modifymobile(2)" class="phone1btn">下一步</a>
              </p>
            {!! Form::close() !!}
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
			  <img src="{{ asset('/')}}images/anquan2.png">
            {!! Form::open(['id'=>'step3','url' => '/auth/modifymobile', 'method' => 'post','class'=>'form-horizontal']) !!}
            <input type="hidden" name="step" value="3">
			  <div class="int">
                    <span class="intspan">新手机号码</span>
                    <input id="newmobile" name="mobile" type="text">
                    <span  id="btnSendCode2" onclick="sendMessage(2)" class="code">获取验证码</span>
                    <span class="code1">59s后重新发送</span>
                    <span class="ts"></span>
              </div>
              <div class="int">
                    <span class="intspan">短信验证码</span>
                    <input name="checkcode" type="text">
                    <span class="ts"></span>
              </div>
              <p class="phonestep1">
                <a href="javascript:;" onclick="modifymobile(3)" class="phone2btn">下一步</a>
              </p>
            {!! Form::close() !!}
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
			  <img src="{{ asset('/')}}images/anquan3.png">
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
