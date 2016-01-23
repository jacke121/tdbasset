@extends('themes.default.layouts')
@include('themes.default.top')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/show.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/plugin/lightbox2/css/lightbox.min.css') }}">
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
                        <li><a href="{{ asset('/images/image_yulan.png') }}" data-lightbox="img-set"><img src="../images/evidence_img.png"></a></li>
                        <li><a href="{{ asset('/images/image_yulan.png') }}" data-lightbox="img-set"><img src="../images/evidence_img.png"></a></li>
                        <li style="margin-right:0;"><a href="{{ asset('/images/image_yulan.png') }}" data-lightbox="img-set"><img src="../images/evidence_img.png"></a></li>
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
                    <p>诉讼催收提成比例：{{ isset($page->zq_czfs_rate)?$page->zq_czfs_rate:0}}</p>
                    <p>非诉催收提成比例：{{ isset( $page->zq_czfs_rate)?$page->zq_czfs_rate:0 }}</p>
                    <p>转让折扣率：{{ isset( $page->zq_czfs_rate)?$page->zq_czfs_rate:0 }}</p>
                </div>
                <div class="writeBox">
                    <p>逾期时间：{{ isset($page->zq_delay)?$page->zq_delay:0 }}天</p>
                    <p>是否有凭证：{{ isset($page->zq_warrant)?'有':'没有'}}</p>
                </div>
                <div class="blueBox">
                    <p>是否有担保：{{ isset($page->zq_warrant)?'是':'否'}}</p>
                    <p>担保方式：{{ isset($page->zq_warrant)?'是':'否'}}</p>
                </div>
                <div class="writeBox">
                    <p>诉讼与否：{{ isset($page->zq_cscs)?'是':'否'}}</p>
                    <p>判决与否：{{ isset($page->zq_cscs)?'是':'否'}}</p>
                </div>
                <div class="blueBox">
                    <p>实地催收次数：{{isset($page->zq_cscs_sd)?$page->zq_cscs_sd:0}}</p>
                    <p>电话催收次数：{{isset($page->zq_cscs_sd)?$page->zq_cscs_sd:0}}</p>
                    <p>委托催收次数：{{isset($page->zq_cscs_sd)?$page->zq_cscs_sd:0}}</p>
                </div>
                <div class="writeBox">
                    <p>债务方是否能正常联系：{{ isset($page->d_isContact)?'是':'否'}}</p>
                    <p>债务方是否有还款能力：{{ isset($page->d_isRepay)?'是':'否'}}</p>
                </div>
            </div>

            @if (Auth::member()->get()&&($isApply))
                @include('themes.default.zq.hasR')
            @else
                @include('themes.default.zq.noR')
            @endif

            <div class="clearfix"></div>

            <div class="applyCollects">
                <meta name="_token" content="{!! csrf_token() !!}"/>
                <div class="col-sm-6">
                    已有  <span> {{isset($page->applys)?$page->applys:0}}</span>  家机构提出代理申请<br>
                    <div id="refreshBtn">
                        @if (isset(Auth::member()->get()->roletype)&&(Auth::member()->get()->authestatus==4))<a  href="javascript:apply({{$page->id}})">申请</a> @else <span><a href="#">申请</a>(需登录及认证)</span> @endif
                    </div>
                </div>
                <div class="col-sm-6 ">
                    已有  <span>{{isset($page->collects)?$page->collects:0}}</span>  家机构收藏了该条信息<br>
                    @if (isset(Auth::member()->get()->roletype)&&(Auth::member()->get()->authestatus==4)) <a href="javascript:collect({{$page->id}})" > 收藏</a> @else <span><a href="#">收藏</a>(需登录及认证)</span>@endif
                </div>
            </div>

        </div>
    </div>

</div>

<div class="clearfix"></div>
<script src="{{ asset('/plugin/lightbox2/js/lightbox-plus-jquery.min.js') }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    lightbox.option({
        'resizeDuration': 200,
        'maxHeight':600,
        'showImageNumberLabel':false
    })


function apply(param){
    $.ajax({
        url: '{{URL("zq/apply")}}',
        type: "post",
        data: {'zid':param, '_token': $('input[name=_token]').val()},
        success: function(data){
            alert(data);
            window.location.reload();
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
                window.location.reload();
            }
        });
    }
</script>
 @include('themes.default.foot')
@endsection
