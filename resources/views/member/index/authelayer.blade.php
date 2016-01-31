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
        .btn_cel{
            background:url("{{asset('/')}}/images/close1.gif")
        }
        .pop h4 {
            position: relative;
            height: 33px;
            padding-left: 10px;
            line-height: 33px;
            background: #f6971c;
            color: #fff;
        }
        .pop {
            position: relative;
            width: 458px;
            height: 305px;
            border: 1px solid #f6971c;
            background-color: #fff;
        }
        span.error {
            padding-left: 10px;
            color: #E15F63
        }
        span.success {
            padding-left: 10px;
        }
    /* box */
    .box{border:4px solid #939393;position:absolute;width:300px;left:50%;height:auto; line-height:55px;z-index:100;background-color:#fff;border:1px #ddd solid;padding:1px;}
    .box img{position:relative;top:10px;margin-left:8px;margin-right:8px}
    #bg{background-color:#666;position:absolute;z-index:99;left:0;top:0;display:none;width:100%;height:100%;opacity:0.5;filter: alpha(opacity=50);-moz-opacity: 0.5;}
</style>
	
    <script type="text/javascript">
        function goitem(){
          $("#divlayer").css("display","");
        }
        function closeyunfeiwin(){
            $("#yunfeidiv").css("display", "none");
            $("#faqbg").css("display", "none");
        }
        function showitem(item){
            location.href="/member/authe/"+item;
        }
        $(document).ready(function(){
            setindex("cen_authenticate");
            $.ajax({
                type: "get",
                url: "/area/province", // type=1表示查询省份
                data: {"parent_id": "1", "type": "1"},
                dataType: "json",
                success: function(data) {
                    $("#provinces").html("<option value=''>请选择省份</option>");
                    $.each(data, function(i, item) {
                        $("#provinces").append("<option value='" + item.provinceID + "'>" + item.province + "</option>");
                    });
                }
            });
            $("#provinces").bind('change',function(){
                $.ajax({
                    type: "get",
                    url: "/area/city", // type =2表示查询市
                    data: {"provinceid": $(this).val(), "type": "2"},
                    dataType: "json",
                    success: function(data) {
                        $("#citys").html("<option value=''>请选择市</option>");
                        $.each(data, function(i, item) {
                            $("#citys").append("<option value='" + item.cityID + "'>" + item.city + "</option>");
                        });
                    }
                });
            });
            $("#citys").bind('change',function(){
                $.ajax({
                    type: "get",
                    url: "/area/area", // type =2表示查询市
                    data: {"cityid": $(this).val(), "type": "3"},
                    dataType: "json",
                    success: function(data) {
                        $("#areas").html("<option value=''>请选择县</option>");
                        $.each(data, function(i, item) {
                            $("#areas").append("<option value='" + item.areaID + "'>" + item.area + "</option>");
                        });
                    }
                });
            });
            $("#areas").bind('change',function(){
                $("#address").val($("#provinces option:selected").text()+" "+$("#citys option:selected").text()+" "+$("#areas option:selected").text());

            });

            $("#layerform").validate({
                errorClass: "error",
                errorElement: "span",
                errorPlacement: function(error, element) {
                    element.after(error);
                },
                rules: {
                    itemname: { required: true, minlength: 3        },
                    addresscode: { required: true},
                    confirm_password: {
                        required: true,
                        rangelength: [6, 16],
                        equalTo: "#password"
                    }
                },
                messages: {
                    addresscode: { required: "所在地不能为空"},
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

                    $("#bg").css({
                        display: "block", height: $(document).height()
                    });
                    var $box = $('.box');
                    $box.css({
                        //设置弹出层距离左边的位置
                        left: ($("body").width() - $box.width()) / 2 - 20 + "px",
                        //设置弹出层距离上面的位置
                        top: ($(window).height() - $box.height()) / 2 + $(window).scrollTop() + "px",
                        display: "block"
                    });
                    var ajax_option={
                        type: "POST", //用POST方式传输
                        dataType: "json", //数据格式:JSON
                        success:function(msg){
                            $("#bg,.box").css("display", "none");
                            if(msg['State']>0){
                                alert(msg['MsgState']);
                            }else{
                                var $box = $("#yunfeidiv");
                                $box.css({
                                    //设置弹出层距离左边的位置
                                    left: ($("body").width() - $box.width()) / 2 - 20 + "px",
                                    //设置弹出层距离上面的位置
                                    top: ($(window).height() - $box.height()) / 2 + $(window).scrollTop() + "px",
                                    display: "block"
                                });
//                                $(".tan").css("display","");
                            }
                        }
                    }
                    $('#layerform').ajaxSubmit(ajax_option);
                }
            });
            var customError = "";
            $.validator.addMethod("onlyemail", function(value, element) {
                var returnVal = true;
                //对电子邮件的验证
                var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                if(!myreg.test(value)){
                    returnVal=false;
                    customError="请输入有效的Email!";
                }else {
                    var msg=checkapprove("email",value);
                    if (msg['State'] > 0) {
                        returnVal=false;
                        customError=msg['MsgState'];
                    } else {
                        returnVal=true;
                    }
                }
                $.validator.messages.onlyemail = customError;
                return returnVal;
            },customError);
            $.validator.addMethod("file", function(value, element) {
                var files=element.files;
                var returnVal = true;
                if( files.length<1){
                    returnVal=false;
                    customError="文件上传不能为空!";
                }
                var filemaxsize = 1024*1024*2;//2M
                for( var i = 0; i < files.length; i++) {
                    file = files[i];
                    if(   file.size>  filemaxsize){
                        returnVal=false;
                        customError="单个文件大小不能超过2M!";
//                        alert("name: "+file.name+" | "+file.size+" | "+file.type);
                    }
                }
                $.validator.messages.file = customError;
                return returnVal;
            },customError);
            $.validator.addMethod("onlycardno", function(value, element) {
                var returnVal = true;
                if(value.length<6){
                    returnVal=false;
                    customError="请输入有效的证件号!";
                }else {
                    var msg=checkapprove("cardno",value);
                    if (msg['State'] > 0) {
                        returnVal=false;
                        customError=msg['MsgState'];
                    } else {
                        returnVal=true;
                    }
                }
                $.validator.messages.onlycardno = customError;
                return returnVal;
            },customError);
        });
        function checkapprove(type,value){
            var obj=null;
            $.ajax({
                type: "POST", async: false,
                url: "/auth/checkapprove", //目标地址
                headers: {'X-CSRF-TOKEN': $('#token').val()},
                data: {
                    type:type, value:value
                },
                dataType: "json", //数据格式:JSON
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("error:" + errorThrown);
                    return null;
                },
                success: function (msg) {
                    obj=msg;
                }
            });
            return obj;
        }
     </script>
</head>

<body>
<div id="bg"></div>
<div class="box" style="display:none">
    <img src="{{asset('/')}}images/waiting.gif" />&nbsp;正在保存中，请稍等．．．
</div>
<div id="faqbg" style="display: none;"></div>
<div id="yunfeidiv" style="display:none;height:210px; z-index:1000;top:30%; position:fixed;left:45%" class="pop pop_v1">
    <h4>
        <span id="winTitle" style="font-size:15px;">温馨提示</span>
        <img  onclick="closeyunfeiwin();" style="margin-top:5px;margin-right:4px;float:right" src="{{asset('/')}}images/close3.gif" width="20px" height="20px">
    </h4>
    <div style=" margin-top: 20px; padding-left: 25px;padding-right: 25px;">
        <form action="order" namespace="/manage" id="update_feesform" name="update_feesform" method="post">
            <div id="divfeeQupdate" style="margin-top: 25px; vertical-align: middle;">
                <label>您的认证信息已提交,我们会在一个工作小时内为您完成审核，请耐心等待</label>
            </div>
            <div align="center" style="margin-top:30px;">
                {{--<a class="btn_reelect btn-newsearch" href="javascript:;" onclick="updateFeeFunction()">保 存</a>--}}
                <input type="button" style="width:79px;height:35px; margin-left:25px;" onclick="showitem('index')"
                       class="btn btn-primary" value="确 定">
            </div>
        </form>
    </div>
</div>
    @include('themes.default.top')
<!--main-->
<div class="banner">
    <img src="{{asset('/')}}images/register—_gg.jpg">
</div>
    <div class="maincon">
        <div class="center">
        @include('member.left_nav')
<!--资格认证-->
        <div class="mainr" >
            <div class="fa_ren">
                <h3 class="fa_renh">资格认证</h3>
                <div class="fa_rencon">
                    <div class="renlist ml1" onclick="goitem()"  id="lawyerId">
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
        <div id="divlayer" class="fa_ren"  @if ($type=="index") style="display:none" @endif>
        <h3 class="fa_renh" style="color: red">律师用户认证   @if ($member->authestatus==3) (认证未通过 )@endif </h3>
        <div class="fa_rencon">
        @if ($member->authestatus==3) 
 		<p class="renper_p" style="color: red">未通过原因：{{$member->authesmsg}}</p>
		@endif
            <p class="renper_p">完成用户认证后，您可在平台参与投标。</p>
            <p class="renper_p">以下所录入信息仅作为平台审核认证使用，不会造成您个人信息的泄露</p>
            <form method="post" id="layerform" enctype="multipart/form-data" action="/member/authe/authelayer">
                <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="roletype" value="2">
                <input type="hidden" id="address" name="address">
            <table class="tableper">
                <tbody><tr>
                  <td class="tdl">律师姓名</td>
                  <td class="tdr"><input type="text" class="int1" name="itemname" value="{{ Auth::member()->get()->itemname}}" id="dlfmc"></td>
                </tr>
                <tr>
                  <td class="tdl">所在地</td>
                  <td class="tdr">
                      <select id="provinces" name="zq_province" class="pubsel"></select>&nbsp;&nbsp;
                      <select id="citys" name="zq_city" class="pubsel"></select>&nbsp;&nbsp;
                      <select id="areas" name="addresscode" class="pubsel"></select>
                </td>
                </tr>
                <tr>
                  <td class="tdl">律师执业证编码</td>
                  <td class="tdr"><input type="text" name="cardno" class="int1 onlycardno"></td>
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
                                <input type="file" name="file[]" multiple size="30">
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
                  <td class="tdr"><input type="text" name="email" class="int1 onlyemail"></td>
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
        </div> </div> </div></div>
        <div style="clear:both;"></div>
<!--foot部分-->
  @include('themes.default.foot')
</body>
</html>
