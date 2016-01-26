@extends('themes.default.layouts')
@include('themes.default.top')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/cooperation.css') }}">

    <!--广告位-->
    <div class="banner">
        <img src="{{ asset('/images/cooperation_banner.png') }}" width="100%" height="267">
    </div>
    <!--内容-->
    <div class="center">
        <div class="cooperation">
            <div style=" margin-bottom:50px; padding-top:42px; padding-left:448px;"><img src="{{ asset('/images/weService_bg.png') }}"></div>
            <p style=" font-size:18px; color:#666666;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;债工厂立足互联网金融生态领域的健康发展与服务创新，依托强大的互联网数据服务系统和完善的不良资产渠道管理系统，整合资产、债权方和处置、清收方进行一站式无缝对接，实现线上委托、线下标准化精准催收和处置全链条服务，让不良资产处置变得简单。</p>
        </div>
    </div>
    <div style="height:649px; background-color:#fff;">
        <div class="center">
            <img src="{{ asset('/images/cooperation_02.png') }}">
        </div>
    </div>
    <div style="height:800px; background-color:#F4F4F4;">
        <div class="center">
            <img src="{{ asset('/images/cooperation_03.png') }}">
        </div>
    </div>

    @include('themes.default.foot')
@endsection