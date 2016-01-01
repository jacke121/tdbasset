@extends('themes.default.layouts')
@include('themes.default.top')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/show.css') }}">
@section('content')
        <!--内容-->
<div class="bg_h">
    <!--债权凭证-->
    <div class="claim">
        <div class="center">
            <div class="claimNumber">
                <div class="claimNumber_top">
                    <h3 style="font-size:18px; color:#323232; width:370px; float:left;">债权编号：{{ $page->id }}</h3>
                    <p class="rate">
                        <i class="star1"></i>
                        <i class="star1"></i>
                        <i class="star1"></i>
                        <i class="star"></i>
                        <i class="star"></i>
                    </p>
                    <span class="ratet">资料模拟评级</span>
                </div>
                <div class="claimNumber_bottom">
                    {{ $page->zq_ms }}
                </div>
            </div>
            <div class="evidence">
                <div class="evidence_top">
                    <h3 style="font-size:18px; color:#323232; width:370px; float:left;">凭证</h3>
                </div>
                <div class="evidence_bottom">
                    <a href="#" class="evidence_left"></a>
                    <ul class="evidence_ul">
                        <li><img src="../images/evidence_img.png"></li>
                        <li><img src="../images/evidence_img.png"></li>
                        <li style="margin-right:0;"><img src="../images/evidence_img.png"></li>
                    </ul>
                    <a href="#" class="evidence_right"></a>
                </div>
            </div>
        </div>
    </div>
    <!--债权信息-->
    <div class="bg_w">
        <div class="center">
            <div class="informationOne">
                <h3 class="inf_h3">债权信息</h3>
                <div class="writeBox">
                    <p>债权金额：￥ {{ $page->zq_quote }}元</p>
                    <p>债务方地址： {{ $page->d_province }} {{ $page->d_city }} {{ $page->d_contry }} </p>
                </div>
                <div class="blueBox">
                    <p>期望处置方式及回报（承诺给处置方）</p>
                    <p>诉讼催收提成比例：{{ $page->zq_czfs_rate }}</p>
                    <p>非诉催收提成比例：{{ $page->zq_czfs_rate }}</p>
                    <p>转让折扣率：{{ $page->zq_czfs_rate }}</p>
                </div>
                <div class="writeBox">
                    <p>逾期时间：{{ $page->zq_delay }}天</p>
                    <p>是否有凭证：{{ $page->zq_warrant}}</p>
                </div>
                <div class="blueBox">
                    <p>是否有担保：{{ $page->zq_warrant}}</p>
                    <p>担保方式：{{ $page->zq_warrant}}</p>
                </div>
                <div class="writeBox">
                    <p>诉讼与否：{{ $page->zq_cscs}}</p>
                    <p>判决与否：{{ $page->zq_cscs}}</p>
                </div>
                <div class="blueBox">
                    <p>实地催收次数：{{ $page->zq_cscs}}</p>
                    <p>电话催收次数：{{ $page->zq_cscs}}</p>
                    <p>委托催收次数：{{ $page->zq_cscs}}</p>
                </div>
                <div class="writeBox">
                    <p>债务方是否能正常联系：{{ $page->d_isContact}}</p>
                    <p>债务方是否有还款能力：{{ $page->d_isRepay}}有能力</p>
                </div>
            </div>

            @if($isApply)
                @include('themes.default.zq.hasR')
            @else
                @include('themes.default.zq.noR')
            @endif

            <div class="clearfix"></div>

            <div class="applyCollects">
                <meta name="_token" content="{!! csrf_token() !!}"/>
                <div class="col-sm-6">
                    已有  <span> {{$page->applys}}</span>  家机构提出代理申请<br>
                    <div id="refreshBtn">
                    <a href="javascript:apply({{$page->id}})">申请</a>
                    </div>
                </div>
                <div class="col-sm-6 ">
                    已有  <span>{{ $page->collects}}</span>  家机构收藏了该条信息<br>
                    <a href="javascript:collect({{$page->id}})"> 收藏</a>
                </div>
            </div>

        </div>
    </div>

</div>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

function apply(param){
    $.ajax({
        url: '{{URL("zq/apply")}}',
        type: "post",
        data: {'zid':param, '_token': $('input[name=_token]').val()},
        success: function(data){
            alert(data);
            //$("#refreshBtn").html("<strong>申请成功</strong>");
        }
    });
}
    function collect(param){
        $.ajax({
            url: '{{URL("zq/collect")}}',
            type: "post",
            data: {'zid':param, '_token': $('input[name=_token]').val()},
            success: function(data){
                alert(data);
            }
        });
    }
</script>
 @include('themes.default.foot')
@endsection
