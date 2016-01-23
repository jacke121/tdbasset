@extends('themes.default.layouts')
@include('themes.default.top')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/product_service.css') }}">

    <!--广告位-->
    <div class="banner">
        <img src="{{ asset('/images/productService_banner.gif') }}" width="1920" height="267">
    </div>
    <!--我们的服务-->
    <div class="weService">
        <div class="center">
            <div class="service_text">
                <div style=" margin-bottom:50px; padding-top:42px; padding-left:432px;"><img src="../images/weService_bg.png"></div>
                <p style=" font-size:18px; color:#666666;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;债工厂秉承“心存正念、关注价值”的企业文化理念，整合资产、债权方（包括银行、P2P、小额信贷、消费金融公司等）和处置、清收方（包括专业催收服务公司、咨询管理服务公司、有催收服务的律师事务所等）进行一站式无缝对接，实现线上委托、线下标准化精准催收和处置的全链条服务，让不良资产处置变得简单。</p>
            </div>
            <ul style=" margin-bottom:50px;">
                <li><img src="{{ asset('/images/weService_yhzcb.png') }}" width="1001" height="285"></li>
                <li><img src="{{ asset('/images/weService_grszb.png') }}" width="1001" height="285"></li>
                <li><img src="{{ asset('/images/weService_szcsb.png') }}" width="1001" height="285"></li>
                <li><img src="{{ asset('/images/weService_flzxb.png') }}" width="1001" height="285"></li>
            </ul>
        </div>
    </div>
    <!--快速服务-->
    <div class="fastService">
        <div class="center">
            <img src="{{ asset('/images/fastService.png') }}">
        </div>
    </div>
    <!--服务优势-->
    <div class="advantage">
        <div class="center">
            <div style=" margin-bottom:50px; padding-top:42px; padding-left:445px;"><img src="{{ asset('/images/advantage_bg.png') }}"></div>
            <ul class="advantage_ul">
                <li style="margin-left:148px; margin-right:108px;"><img src="{{ asset('/images/advantage_01.png') }}" width="163" height="186" onMouseOver="img"><br><span>智能优选</span></li>
                <li><img src="{{ asset('/images/advantage_02.png') }}" width="163" height="186"><br><span>安全保障</span></li>
                <li style="margin-left:108px; margin-right:148px;"><img src="{{ asset('/images/advantage_03.png') }}" width="163" height="186"><br><span>高效资源</span></li>
            </ul>
            <div style=" clear:both;"></div>
            <div class="last">
                <p>领先的大数据催搜查询系统，规避催收风险，降低催收成本，轻松变现回款</p>
                <p></p>
                <p></p>
            </div>
        </div>
    </div>

    @include('themes.default.foot')
@endsection