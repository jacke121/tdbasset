@extends('backend.authe.common')
<script type="text/javascript">
    $(function(){
        setindex("liauthe");
        setmembertype("liapproved");
    });
</script>
@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">律师会员资料</div>
        @if ($errors->has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <strong>Error!</strong>
            {{ $errors->first('error', ':message') }}
            <br />
            请联系开发者！
        </div>
        @endif
        <div class="mainr" >
            <!--个人用户认证审核中页面-->
            <div class="renover">
                <h3 class="fa_renh">
                    个人用户认证
                    （未认证）
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
                <p class="tabtit">委托方类型：个人</p>
                <div class="tan1">
                    <table cellspacing="0">
                        <tbody><tr>
                            <td>姓名 :<span>{{ Auth::member()->get()->itemname}}</span></td>
                            <td>身份证号:<span>{{ Auth::member()->get()->cardno}}</span></td>
                        </tr>
                        <tr>
                            <td>所在地址 :<span id="szdz">北京市 北京市 朝阳区</span></td>
                            <td>邮箱:<span>{{ Auth::member()->get()->email}}</span></td>
                        </tr>
                        <tr>
                            <td>联系电话 :<span>{{ Auth::member()->get()->mobile}}</span></td>
                            <td></td>
                        </tr>
                        </tbody></table>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">营业执照</label>
                    <div class="col-sm-8">
                        <ul id="faceul">
                            @foreach($member->cardnourl as $key=>$img)
                                <li><a href="#"><img src="{{ URL::asset('/')}}{{$img}}" /></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                {{--<p class="tabtit">身份证扫描件：</p>--}}
                {{--<div class="tabpic">--}}
                    {{--<table cellspacing="0">--}}
                        {{--<tbody><tr>--}}
                            {{--<td>正面</td>--}}
                            {{--<td>反面</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td id="pc1"><img></td>--}}
                            {{--<td id="pc2"><img></td>--}}
                        {{--</tr>--}}
                        {{--</tbody></table>--}}
                {{--</div>--}}
                <p>提示：您的资料正在进行认证，如需修改请直接拨打客服电话，或点击在线客服联系</p>
            </div>
        </div>
    </div>
</div>
@endsection