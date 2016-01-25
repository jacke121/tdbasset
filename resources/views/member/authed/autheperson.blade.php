<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>个人中心</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/css/personal center.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css')}}">
    <script src="{{asset('/js/jquery-1.11.3.min.js') }}"></script>
    <style>
        span.error {
            padding-left: 16px;
            color: #E15F63
        }

        span.success {
            background: url("{{ asset('images/checked.gif')}}") no-repeat 0px 0px;
            padding-left: 16px;
        }
    </style>
    <script src="{{ asset('/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        function showitem(item) {
            location.href = "/member/authe/" + item;
        }
        $(document).ready(function () {
            $("#personform").validate({
                errorClass: "error",
                errorElement: "span",
                errorPlacement: function (error, element) {
                    element.after(error);
                },
                rules: {
                    itemname: {required: true, minlength: 3},
                    confirm_password: {
                        required: true,
                        rangelength: [6, 16],
                        equalTo: "#password"
                    }
                },
                messages: {
                    itemname: {required: "必填", minlength: $.validator.format("不得少于{0}字符.")},
                    confirm_password: {
                        required: "请填写确认密码！",
                        rangelength: "密码需由6-16个字符（数字、字母）组成！",
                        equalTo: "两次输入密码不一致！"
                    }
                },
                // onkeyup: false,　　　　//这个地方要注意，修改去控制器验证的事件。
                // onsubmit: false,
                success: function (label) {
                    label.html("<font color='green'>√</font>").addClass("success");
                },
                unhighlight: function (element, errorClass, validClass) {
                    // $(element).html("<font color='green'>√</font>");
                },
                submitHandler: function (form) {
                    $.ajax({
                        type: "POST", //用POST方式传输
                        url: $("#personform").attr("action"), //目标地址
                        headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                        data: $('#personform').serialize(),
                        dataType: "json", //数据格式:JSON
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert("error:" + errorThrown);
                            return null;
                        },
                        success: function (msg) {
                            if (msg['State'] > 0) {
                                alert(msg['MsgState']);
                            } else {
                                $(".tan").css("display", "");
                            }
                        }
                    });
                }
            });

            var customError = "";
            $.validator.addMethod("onlyMobile", function (value, element) {
                var returnVal = true;
                var mobile = value;  //获取手机号
                var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
                if (mobile.length == 0 || mobile.length != 11 || (!myreg.test(mobile))) {
                    returnVal = false;
                    customError = "请输入正确的手机格式!";
                } else if (!checkUser("mobile", value)) {
                    returnVal = false;
                    customError = "手机号已存在!";
                }
                $.validator.messages.onlyMobile = customError;
                return returnVal;
            }, customError);
        });
    </script>
</head>

<body>
@include('themes.default.top')
        <!--main-->
<div class="maincon">
    @include('member.left_nav')
            <!--资格认证-->
    <div class="mainr">
        <!--个人用户认证审核中页面-->
        <div class="renover">
            <h3 class="fa_renh">
                个人用户认证
               @if ($member->authestatus==4) (认证成功 )@else (账户冻结) @endif
            </h3>

            <h3 class="renoverh">
                <span>基本信息</span>
            </h3>

            <div class="tan1">
                <table cellspacing="0">
                    <tbody>
                    <tr>
                        <td>登录名 :<span>{{ Auth::member()->get()->name}}</span></td>
                        <td>联系电话 :<span>{{ Auth::member()->get()->mobile}}</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h3 class="renoverh">
                <span>认证信息</span>
            </h3>

            <p class="tabtit">委托方类型：个人</p>

            <div class="tan1">
                <table cellspacing="0">
                    <tbody>
                    <tr>
                        <td>姓名 :<span>{{ Auth::member()->get()->itemname}}</span></td>
                        <td>身份证号:<span>{{ Auth::member()->get()->cardno}}</span></td>
                    </tr>
                    <tr>
                        <td>所在地址 :<span id="szdz">{{ Auth::member()->get()->address}}</span></td>
                        <td>邮箱:<span>{{ Auth::member()->get()->email}}</span></td>
                    </tr>
                    <tr>
                        <td>联系电话 :<span>{{ Auth::member()->get()->mobile}}</span></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <p class="tabtit">身份证扫描件：</p>

            <div class="tabpic">
                <table cellspacing="0">
                    <tbody>
                    <tr>
                        <td>正面</td>
                        <td>反面</td>
                    </tr>
                    <tr>
                        <td id="pc1"><img></td>
                        <td id="pc2"><img></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <p>提示：您的资料正在进行认证，如需修改请直接拨打客服电话，或点击在线客服联系</p>
        </div>
    </div>
</div>
<div style="clear:both;"></div>
<!--foot部分-->
@include('themes.default.foot')
</body>
</html>
