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
        function goitem(){
          $("#divlayer").css("display","");
        }

        function showitem(item){
            location.href="/member/authe/"+item;
        }
        $(document).ready(function(){
            setindex("cen_authenticate");
        });
     </script>
</head>

<body>
    @include('themes.default.top')
<!--main-->
    <div class="maincon">
        <div class="center">
        @include('member.left_nav')
<!--资格认证-->
        <div class="mainr" >
            <!--个人用户认证审核中页面-->
            <div class="renover">
                <h3 class="fa_renh">
                    律师用户认证
                    @if ($member->authestatus==4) (认证成功 )@else (账户冻结) @endif
                </h3>
                <h3 class="renoverh">
                    <span>基本信息</span>
                </h3>
                <div class="tan1">
                    <table cellspacing="0">
                        <tbody><tr>
                            <td>登录名 :<span>{{ Auth::member()->get()->name}}</span></td>
                            <td>联系电话 :<span>{{ Auth::member()->get()->mobile}}</span></td>
                        </tr>
                        </tbody></table>
                </div>
                <h3 class="renoverh">
                    <span>认证信息</span>
                </h3>
                <p class="tabtit">代理方类型：律师</p>
                <div class="tan1">
                    <table cellspacing="0">
                        <tbody><tr>
                            <td>律师姓名 :<span>{{ Auth::member()->get()->itemname}}</span></td>
                            <td>律师执业证编码:<span>{{ Auth::member()->get()->cardno}}</span></td>
                        </tr>
                        <tr>
                            <td>所在律师所 :<span>{{ Auth::member()->get()->ownername}}</span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>所在地址 :<span id="szdz">{{ Auth::member()->get()->address}}</span></td>
                            <td>邮箱:<span>{{ Auth::member()->get()->email}}</span></td>
                        </tr>
                        <tr>
                            <td>联系电话 :<span>{{ Auth::member()->get()->mobile}}</span></td>
                            <td></td>
                        </tr>
                        </tbody></table>
                </div>
                <p class="tabtit">执照资格证书：</p>
                <div class="tabpic">
                    <table cellspacing="0">
                        <tbody><tr>
                            <td colspan="2">
                                <div class="col-sm-8">
                                    <ul id="faceul">
                                        @foreach($member->cardnourl as $key=>$img)
                                            <li><a href="#"><img src="{{ URL::asset('/')}}{{$img}}" /></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
                <p>提示：您的资料正在进行认证，如需修改请直接拨打客服电话，或点击在线客服联系</p>
            </div>
        </div>
        <div style="clear:both;"></div></div></div>
<!--foot部分-->
  @include('themes.default.foot')
</body>
</html>
