@extends('themes.default.layouts')
@include('themes.default.top')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">
<!--广告位-->
<div class="banner">
    <img src="../images/list_ggw.png">
</div>
<!--个人债务宝-->
<div style="width:100%; height:1250px; background:#F4F4F4;">
    <div class="center">
        <ul class="control">
            <li style="width:334px;"><a id="types_gr" href="{{URL('zq?types=gr')}}">个人债务宝</a></li>
            <li style="width:333px;"><a id="types_gs" href="{{URL('zq?types=gs')}}">企业商账通</a></li>
            <li style="width:331px;"><a id="types_fy" href="{{URL('zq?types=fy')}}">判决执行宝</a></li>
        </ul>
    </div>
    <div class="personal_debt">
        <form action="{{URL('zq')}}" method="get">
            <input type="hidden" name="types" value="{{$types}}">
            <input id="debt_money" type="hidden" name="debt_money" value="{{$debt_money}}">
            <input id="debt_time" type="hidden" name="debt_time" value="{{$debt_time}}">

        <div class="center">
            <ul class="debt_city">
                <li><span> @if($types=='fy')判决人@else债务人@endif所在地：</span></li>
                <li>
                    <select class="province" name="province">
                    </select>
                </li>
                <li>
                    <select class="province" name="city">
                    </select>
                </li>
                <li>
                    <select class="province" name="area">
                    </select>
                </li>
            </ul>
            @if($types != "fy")
            <ul class="debt_time">
                <li><span>债权逾期时间：</span></li>
                <li data="0"><a id="debt_time_0" href="javascript:;">不限</a></li>
                <li data="1"><a id="debt_time_1" href="javascript:;">半年内</a></li>
                <li data="2"><a id="debt_time_2" href="javascript:;">一年内</a></li>
                <li data="3"><a id="debt_time_3" href="javascript:;">两年内</a></li>
                <li data="4"><a id="debt_time_4" href="javascript:;">两年以上</a></li>
            </ul>
           @endif
            <ul class="debt_money">
                <li><span>债权金额：</span></li>
                <li data="0"><a id="debt_money_0"  href="javascript:;">不限</a></li>
                <li data="1"><a id="debt_money_1"  href="javascript:;">10万以下</a></li>
                <li data="2"><a id="debt_money_2"  href="javascript:;">10~100万</a></li>
                <li data="3"><a id="debt_money_3"  href="javascript:;">100万以上</a></li>
            </ul>
            <ul>
                <li><button type="submit" class="search">搜索</button></li>
            </ul>
        </div>
        </form>
    </div>

    <div class="clearfix"></div>

    <!--不良资产编号-->
    <div class="center">
        @foreach($zqList as $k=> $v)
        <div class="badAssets">
            <div class="badAssets_l">
                <h3 class="number">不良资产编号：GR20151204-{{ $v->id }}</h3>
                <div style="float:left; margin:0 23px 0 30px;"><img src="../images/fudai.png"></div>
                <div class="fl">
                    <p class="f16 col6"><span class="f22">{{ $v->zq_quote }}</span>万</p>
                    <p class="f14 col6">债权金额</p>
                </div>
                <div class="fl" style="margin-left:75px;">
                    <p class="f16 col6"><span class="f22">{{ $v->zq_delay }}</span>天</p>
                    <p class="f14 col6">逾期时间</p>
                </div>
                <div class="fl" style="margin-left:75px;">
                    <p class="f16 col6"><span class="f22">{{ $v->o_province }}</span></p>
                    <p class="f14 col6">所在地</p>
                </div>
                <div class="fl" style="margin-left:75px;">
                    <p class="f16 col6"><span class="f22">无</span></p>
                    <p class="f14 col6">债权凭证</p>
                </div>
            </div>
            <div class="badAssets_r">
                <div class="pro">
                    <span class="f18">招标中</span>

                </div>
                <div class="badAssetsr_b">
                    <p>申请数 <span>{{ $v->applys }}</span>&nbsp;&nbsp;&nbsp;&nbsp;收藏数 <span>{{ $v->collects }}</span></p>
                    <p style="margin-top:5px;">发布时间：2015年12月04日</p>
                </div>
                <a href="{{ url(route('zq.show',['id'=>$v->id ])) }}" class="badAssetsrb_ckxq">查看详情</a>
            </div>
            </div>
            @endforeach

           @if(sizeof($zqList)==0) <h3 class="text-center"> 此类选择没有数据 </h3>@endif

            <!--分页-->
            <div class="container">
                <div class="pull-right">
                    {!! $zqList->render() !!}
                </div>
            </div>

        </div>

      <div class="clearfix"></div>
      @include('themes.default.foot')

    </div>
</div>

<script src="{{ asset('/js/PCASClass.js') }}"></script>
<script src="{{ asset('/plugin/swfupload/swfupload.js') }}"></script>
<script src="{{ asset('/plugin/swfupload/swfupload.queue.js') }}"></script>
<script src="{{ asset('/plugin/swfupload/fileprogress.js') }}"></script>
<script src="{{ asset('/plugin/swfupload/handlers.js') }}"></script>

<script type="text/javascript">
    $("#types_{{$types}}").addClass("current");
    new PCAS("province,{{$province}}","city,{{$city}}","area,{{$area}}");
    $("#debt_time_{{$debt_time}}").addClass("currentOne");
    $("#debt_money_{{$debt_money}}").addClass("currentOne");

    var swfu;
    window.onload = function() {
        var settings = {
            flash_url : "{{ asset('/plugin/swfupload/swfupload.swf') }}",
            upload_url: "",
            post_params: {"_token" : "{{ csrf_token() }}"},
            file_size_limit : "100 MB",
            file_types : "*.*",
            file_types_description : "All Files",
            file_upload_limit : 100,
            file_queue_limit : 0,
            custom_settings : {
                progressTarget : "fsUploadProgress",
                cancelButtonId : "btnCancel"
            },
            debug: false,

            // Button settings
            button_image_url: "{{ asset('/plugin/swfupload/color_img.png')}}",
            button_width: "65",
            button_height: "29",
            button_placeholder_id: "spanButtonPlaceHolder",
            button_text: '<span class="theFont">Hello</span>',
            button_text_style: ".theFont { font-size: 16; }",
            button_text_left_padding: 12,
            button_text_top_padding: 3,

            // The event handler functions are defined in handlers.js
            file_queued_handler : fileQueued,
            file_queue_error_handler : fileQueueError,
            file_dialog_complete_handler : fileDialogComplete,
            upload_start_handler : uploadStart,
            upload_progress_handler : uploadProgress,
            upload_error_handler : uploadError,
            upload_success_handler : uploadSuccess,
            upload_complete_handler : uploadComplete,
            queue_complete_handler : queueComplete	// Queue plugin event
        };
        swfu = new SWFUpload(settings);
    };

    jQuery(document).ready(function($) {
        $(".debt_time li a").click(function(){
            $(".debt_time li a").removeClass("currentOne");
            $(this).addClass("currentOne");
            $("#debt_time").val( $(this).parent("li").attr("data"));
        })
        $(".debt_money li a").click(function(){
            $(".debt_money li a").removeClass("currentOne");
            $(this).addClass("currentOne");
            $("#debt_money").val( $(this).parent("li").attr("data"));
        })
    })
</script>
@endsection