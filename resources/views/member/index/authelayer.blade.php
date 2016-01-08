<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="{{asset('/css/personal center.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">
<script src="{{asset('/js/jquery-1.11.3.min.js') }}"></script>
    <script src="{{asset('/js/jquery.form.js') }}"></script>
    <script src="{{ asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <style>
        span.error {
            padding-left: 16px;
            color: #E15F63
        }
        span.success {
            background:url("{{ asset('images/checked.gif')}}") no-repeat 0px 0px;
            padding-left: 16px;
        }
    </style>

    <script type="text/javascript">

        function upload(){
            alert(11);
            $('#imgForm').ajaxForm(options).submit();
        }

        function showitem(item){
            location.href="/member/authe/"+item;
        }
        function showRequest() {
//            $("#validation-errors").hide().empty();
//            $("#output").css('display','none');
            return true;
        }

        function showResponse(response)  {

            if(response['State']>0){
                   alert(response['MsgState']);
                 }else{
                $(".tan").css("display","");
            }
            if(response.success == false)
            {
                var responseErrors = response.errors;
                $.each(responseErrors, function(index, value)
                {
                    if (value.length != 0)
                    {
                        $("#validation-errors").append('<div class="alert alert-error"><strong>'+ value +'</strong><div>');
                    }
                });
                $("#validation-errors").show();
            } else {
                $('.upload-mask').hide();
                $('.upload-file').hide();
                $('.pic-upload').next().css('display','block');
                console.log(response.pic);
                $("#"+response.id).attr('src',response.pic);
                $("#"+response.id).next().attr('value',response.pic);
            }
        }
        $(document).ready(function(){
            $("#layerform").validate({
                errorClass: "error",
                errorElement: "span",
                errorPlacement: function(error, element) {
                    element.after(error);
                },
                rules: {
                    itemname: { required: true, minlength: 3        },
                    confirm_password: {
                        required: true,
                        rangelength: [6, 16],
                        equalTo: "#password"
                    }
                },
                messages: {
                    itemname: { required: "必填", minlength: $.validator.format("不得少于{0}字符.")},
                    confirm_password: {
                        required: "请填写确认密码！",
                        rangelength: "密码需由6-16个字符（数字、字母）组成！",
                        equalTo: "两次输入密码不一致！"
                    }
                },
                // onkeyup: false,　　　　//这个地方要注意，修改去控制器验证的事件。
                // onsubmit: false,
                success: function(label) {
                    label.html("<font color='green'>√</font>").addClass("success");
                },
                unhighlight: function(element, errorClass, validClass) {
                    // $(element).html("<font color='green'>√</font>");
                },
                submitHandler: function(form){
                    var options = {
                        beforeSubmit:  showRequest,
                        success:       showResponse,
                        dataType: 'json'
                    };
                    $('#layerform').ajaxForm(options).submit();

//                    $.ajax({
//                        type: "POST", //用POST方式传输
//                        url:$("#layerform").attr("action"), //目标地址
//                        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
//                        data:$('#layerform').serialize(),
//                        dataType: "json", //数据格式:JSON
//                        error: function (XMLHttpRequest, textStatus, errorThrown) {
//                            alert("error:"+errorThrown);
//                            return null;
//                        },
//                        success: function (msg){
//                            if(msg['State']>0){
//                                alert(msg['MsgState']);
//                            }else{
//                               $(".tan").css("display","");
//                            }
//                        }
//                    });
                }
            });
            $.validator.addMethod("onlyName", function(value, element) {
                return checkUser("name",value);
            },"用户名已存在!");
            var customError = "";
            $.validator.addMethod("onlyMobile", function(value, element) {
                var returnVal = true;
                var mobile =value;  //获取手机号
                var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
                if(mobile.length==0 || mobile.length!=11 ||(!myreg.test(mobile))){
                    returnVal=false;
                    customError="请输入正确的手机格式!";
                }else if(! checkUser("mobile",value)){
                    returnVal=false;
                    customError="手机号已存在!";
                }
                $.validator.messages.onlyMobile = customError;
                return returnVal;
            },customError);
        });
     </script>
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
                    <div class="renlist ml1" onclick="showitem('layer')"  id="lawyerId">
                    <h3>律师用户认证</h3>
                    <img src="{{asset('/images/lsrz.png')}}" width="110px" height="110px">
                    <p>未提交认证申请</p>
                    <input type="hidden" id="lawyerAuth" value="0">
                    </div>
                    <div class="renlist ml2" onclick="showitem('authecompany')"  id="orgId">
                    <h3>企业用户认证</h3>
                    <img src="{{asset('images/qyrz.png')}}" width="110px" height="110px">
                    <p>未提交认证申请</p>
                    <input type="hidden" id="orgAuth" value="0">
                    </div>
                    <div class="renlist ml3" onclick="showitem('autheperson')"  id="orgId">
                    <h3>个人用户认证</h3>
                    <img src="{{asset('images/qyrz.png')}}" width="110px" height="110px">
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
            <form method="post" id="layerform" enctype="multipart/form-data" action="/member/authe/authelayer">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="roletype" value="2">

            <table class="tableper">
                <tbody><tr>
                  <td class="tdl">律师姓名</td>
                  <td class="tdr"><input type="text" class="int1" name="itemname" value="{{ Auth::member()->get()->itemname}}" id="dlfmc"></td>
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
                  <td class="tdr"><input type="text" name="cardno" class="int1"></td>
                </tr>
                <tr>
                  <td class="tdl">所在律师所</td>
                  <td class="tdr"><input type="text" name="ownername" class="int1"></td>
                </tr>
                <tr>
                  <td class="tdl">上传执照资格证书 (*)</td>
				<td class="tdr">
                    <div class="upload_box">
                        <div class="upload_main">
                            <div class="upload_choose">
                                <input type="file" name="file" size="30">
                            </div>
                            <div class="upload_preview"></div>
                        </div>
                        <input type="hidden" name="pjcsbs">
                        <div class="upload_submit">
                            <!-- <button type="button" id="fileSubmit" class="upload_submit_btn">确认上传图片</button> -->
                        </div>
                        <div class="upload_inf"></div>
                    </div>

				</td>
			</tr>
			<tr>
				<td class="tdl" style="color: red">提示：</td>
				<td class="tdr">证书上的所有信息清晰可见，必须能看得清证件号。<br>
				照片内容真实有效，不得做任何修改。<br>
				支持：jpg、jpeg、 bmp、 png格式照片，大小不得超过2M。
				</td>
			</tr>
			
                <tr>
                  <td class="tdl">联系邮箱</td>
                  <td class="tdr"><input type="text" name="email" class="int1"></td>
                </tr>
                <tr>
                  <td class="tdl"></td>
                  <td class="tdr"><input type="submit" class="reg2btn" value="立即认证"></td>
                </tr>
            </tbody></table>
            </form>
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
        </div> </div> </div>
        <div style="clear:both;"></div>
<!--foot部分-->
  @include('themes.default.foot')
</body>
</html>
