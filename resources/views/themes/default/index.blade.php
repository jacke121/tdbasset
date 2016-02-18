@extends('themes.default.layouts')

@section('header')
    <title>{{systemConfig('title','Enda Blog') }} - {{ systemConfig('subheading','Enda Blog') }}</title>
    <meta name="keywords" content="{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{{ systemConfig('seo_desc') }}">


<script src="../js/index.js"></script>

@include('themes.default.top')
@endsection

@section('content')
<section class="banner">
</section>

<!-- /.banner <section class=" content">-->

<!--banner部分-->
<div class="slides">
    <div class="slideInner">
        <a href="#" style="background:url({{ URL::asset('/')}}images/index_banner1.png) no-repeat center top;"></a>
        <a href="#" style="background:url({{ URL::asset('/')}}images/index_banner2.png) no-repeat center top;"></a>
        <a href="#" style="background:url({{ URL::asset('/')}}images/index_banner3.png) no-repeat center top;"></a>
        
    </div>
    <div class="nav">
        <a class="prev" href="javascript:;"></a>
        <a class="next" href="javascript:;"></a>
    </div>
</div>
<!--内容部分-->
    <div style=" width:100%; height:161px; background:#F4F4F4;">
        <div class="center">
            <div class="notice">
                @foreach($messageList as $k=> $v)
               <div class="noticeSlide">
                   <div style="width: 999px;margin: auto">
                <div class="notice_01">
                    <div style="float:left;padding:6px 10px 0 15px;"><img src="../images/notice_img.jpg" width="19" height="20"></div>
                    <span>网站公告&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <p style=" display:inline-block;">{{$v->title}}</p>
                </div>
                <div class="notice_02">
                    <span>{{$v->created_at}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a target="_blank" href="{{URL('article?cateId=7')}}" style="color:#999999; font-size:14px; margin-right:20px;">更多>></a>
                </div>
                   </div>
               </div>
                @endforeach
            </div>
            <div class="figure">
                <ul class="figure_ul" style="width:264px;">
                    <li class="figure_li01"><b class="orange">537.97</b><p class="blue">亿元</p></li>
                    <li class="figure_li02"><span>发布金额</span></li>
                </ul>
                <ul class="figure_ul" style="width:249px;">
                    <li class="figure_li01"><b class="orange">369.90</b><p class="blue">亿元</p></li>
                    <li class="figure_li02"><span>已处置金额</span></li>
                </ul>
                <ul class="figure_ul" style="width:254px;">
                    <li class="figure_li01"><b class="orange">220.30</b><p class="blue">亿元</p></li>
                    <li class="figure_li02"><span>委托方入驻</span></li>
                </ul>
                <ul class="figure_ul" style="width:173px;">
                    <li class="figure_li01"><b class="orange">12.86</b><p class="blue">亿元</p></li>
                    <li class="figure_li02"><span>代理方入驻</span></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div style="width:100%; height:224px; background:#F1F1F1;">
        <div class="center">
            <ul class="system">
                <li style="width:182px;"><img src="../images/system_01.jpg" width="109" height="107"></li>
                <li style="width:201px;"><img src="../images/system_02.jpg" width="109" height="107"></li>
                <li style="width:204px;"><img src="../images/system_03.jpg" width="109" height="107"></li>
                <li style="width:198px;"><img src="../images/system_04.jpg" width="109" height="107"></li>
                <li style="width:109px;"><img src="../images/system_05.jpg" width="109" height="107"></li>
            </ul>
            <ul class="systems">
                <li>创新催收管理系统</li>
                <li>首创资产交易系统</li>
                <li>强大数据库引擎</li>
                <li>全产业链链接系统</li>
                <li>精确匹配系统</li>
            </ul>
        </div>
    </div>
    <div style="width:100%; background:#F4F4F4;">
        <div class="center">
            <ul class="control">
                <li style="width:334px;" class="current" data="grZqList"><a href="javascript:void(0)">个人债务宝</a></li>
                <li style="width:333px;" data="gsZqList"><a href="javascript:void(0)">企业商账通</a></li>
                <li style="width:331px;" data="fyZqList"><a href="javascript:void(0)">判决执行宝</a></li>
            </ul>
            <div class="write">
                <ul id="grZqList" class="write_ul mainUl">
                    <li style=" height:37px; line-height:37px; padding-left:76px;">
                        <span style="width:140px;">形式</span>
                        <span style="width:140px;">城市</span>
                        <span style="width:180px;">资产总额</span>
                        <span style="width:180px;">代理费率</span>
                        <span>逾期时间(天)</span>
                    </li>
                    @foreach($grZqList as $k=> $v)
                    <li>
                        <ul class="writeul_ul">
                            <li style="width:144px;">
                                <div class="shape">类型</div>
                            </li>
                            <li style="width:165px;">
                                <div class="city">{{isset($v->o_province)?$v->o_province:"未选择"}}</div>
                            </li>
                            <li style="width:204px;">
                                <i class="blue">{{isset($v->zq_quote)?$v->zq_quote:"未填写"}}</i>万元
                            </li>
                            <li style="width:176px;"><i class="blue">{{isset($v->zq_czfs_sscs_rate)?$v->zq_czfs_sscs_rate:"未填写"}}</i>%</li>
                            <li style="width:133px;"><i class="blue">{{isset($v->zq_delay)?$v->zq_delay:"未填写"}}</i>天</li>
                            <li style="width:126px;">
                                <div class="shape"><a target="_blank" href="{{ url(route('zq.show',['id'=>$v->id ])) }}">招标中</a></div>
                            </li>
                        </ul>
                    </li>
                    @endforeach
                </ul>

                <ul id="gsZqList" class="write_ul mainUl hidden">
                    <li style=" height:37px; line-height:37px; padding-left:76px;">
                        <span style="width:140px;">形式</span>
                        <span style="width:140px;">城市</span>
                        <span style="width:180px;">资产总额</span>
                        <span style="width:180px;">代理费率</span>
                        <span>逾期时间(天)</span>
                    </li>
                    @foreach($gsZqList as $k=> $v)
                        <li>
                            <ul class="writeul_ul">
                                <li style="width:144px;">
                                    <div class="shape">类型</div>
                                </li>
                                <li style="width:165px;">
                                    <div class="city">{{isset($v->o_province)?$v->o_province:"未选择"}}</div>
                                </li>
                                <li style="width:204px;">
                                    <i class="blue">{{isset($v->zq_quote)?$v->zq_quote:"未填写"}}</i>万元
                                </li>
                                <li style="width:176px;"><i class="blue">{{isset($v->zq_czfs_sscs_rate)?$v->zq_czfs_sscs_rate:"未填写"}}</i>%</li>
                                <li style="width:133px;"><i class="blue">{{isset($v->zq_delay)?$v->zq_delay:"未填写"}}</i>天</li>
                                <li style="width:126px;">
                                    <div class="shape"><a target="_blank" href="{{ url(route('zq.show',['id'=>$v->id ])) }}">招标中</a></div>
                                </li>
                            </ul>
                        </li>
                    @endforeach
                </ul>

                <ul id="fyZqList" class="write_ul mainUl hidden">
                    <li style=" height:37px; line-height:37px; padding-left:76px;">
                        <span style="width:140px;">形式</span>
                        <span style="width:140px;">城市</span>
                        <span style="width:180px;">资产总额</span>
                        <span style="width:180px;">代理费率</span>
                        <span>逾期时间(天)</span>
                    </li>
                    @foreach($fyZqList as $k=> $v)
                        <li>
                            <ul class="writeul_ul">
                                <li style="width:144px;">
                                    <div class="shape">类型</div>
                                </li>
                                <li style="width:165px;">
                                    <div class="city">{{isset($v->o_province)?$v->o_province:"未选择"}}</div>
                                </li>
                                <li style="width:204px;">
                                    <i class="blue">{{isset($v->zq_quote)?$v->zq_quote:"未填写"}}</i>万元
                                </li>
                                <li style="width:176px;"><i class="blue">{{isset($v->zq_czfs_sscs_rate)?$v->zq_czfs_sscs_rate:"未填写"}}</i>%</li>
                                <li style="width:133px;"><i class="blue">{{isset($v->zq_delay)?$v->zq_delay:"未填写"}}</i>天</li>
                                <li style="width:126px;">
                                    <div class="shape"><a target="_blank" href="{{ url(route('zq.show',['id'=>$v->id ])) }}">招标中</a></div>
                                </li>
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </div>
<!-- 一键免费发布 -->
            <div class="release">
                <div style=" font-size:22px; color:#323232; padding-left:11px; margin-bottom:22px;">一键免费发布</div>
                <div class="release_inp">
                    <div class="int">
                        <meta name="_token" content="{!! csrf_token() !!}"/>
                        <input id="userName" type="text" placeholder="姓名" class="user" id="user">
                    </div>
                    <div class="int_1">
                        <input id="phone" type="text" placeholder="电话" class="phone" id="phone">
                    </div>
                    <a href="javaScript:submitMessage();" class="fabubtn">立即发布</a>
                    <p class="fabup">(评估师30分钟内回电)</p>
                </div>
            </div>
<!--新闻资讯-->          
            <div class="news">
                <div class="center">
                    <div class="newsLeft">
                        <div class="nlTit">
                            新闻资讯
                            <a target="_blank" href="article?catId=7" style="float:right; color:#999999; font-size:12px;">+更多</a>
                        </div>
                        @foreach($newsList as $k=> $v)
                        <div class="newsCon">
                            <div class="ncPic">
                                <img src="{{isset($v->pic)?$v->pic:'../images/zhibo.jpg'}}">
                            </div>
                            <div class="ncTxt">
                                <a target="_blank" href="{{ url(route('article.show',['id'=>$v->id ])) }}" class="ta">{{$v->title}}</a>
                                <p class="tp">{{isset($v->tags)?$v->tags:''}}</p>
                                <span style="float:right; font-size:12px; color:#999999;">{{$v->created_at}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="newsRight">
                        <div class="nlTit">
                            债务常识
                            <a target="_blank" href="article?catId=5" style="float:right; color:#999999; font-size:12px;">+更多</a>
                        </div>
                        <div style="min-height: 20px;"></div>
                        @foreach($infoList as $k=> $v)
                        <div class=" newsCon">
                            <div class="ncTxt">
                                <a target="_blank" href="{{ url(route('article.show',['id'=>$v->id ])) }}" class="ta">{{$v->title}}</a>
                                <p class="tp">{{isset($v->tags)?$v->tags:''}}</p>
                                <span style="float:right; font-size:12px; color:#999999;">{{$v->created_at}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--合作伙伴-->
    <div class="hezuo">
        <div class="center">
            <div class="hezuoTitle">合作伙伴</div>
            <div class="img_btn">
                <a class="leftbtn" href="#"><img src="{{ URL::asset('/')}}images/btn_left.jpg"></a>
                <a class="rightbtn" href="#"><img src="{{ URL::asset('/')}}images/btn_right.jpg"></a>
               
                    <ul class="hezuo_img">
                        <li><a href="#"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li style="margin-right: 0px;"><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                    </ul>
            </div>
        </div>
    </div>


<!-- /section.content </section>-->
 <!--foot部分-->
<script >
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
    $(document).ready(function() {
        $(".slideInner").slide({
            slideContainer: $('.slideInner a'),
            effect: 'easeOutCirc',
            autoRunTime: 5000,
            slideSpeed: 1000,
            nav: true,
            autoRun: true,
            prevBtn: $('a.prev'),
            nextBtn: $('a.next')
        })
/**
        $(".notice").slide({
            slideContainer: $('.notice .noticeSlide'),
            effect: 'easeOutCirc',
            autoRunTime: 5000,
            slideSpeed: 1000,
            nav: false,
            autoRun: true
        })
**/
        $(".control li").click(function(){
            $(".control li").removeClass("current");
            $(this).addClass("current");
            $(".write ul.mainUl").addClass("hidden");
            var $zqULId = $("#"+$(this).attr("data"));
            $zqULId.removeClass("hidden");
        })
    })

   function submitMessage(){
           var userName = $("#userName").val();
           var contact = $("#phone").val();
           if(userName.trim().length==0){
               alert("姓名必须填写");
               return;
           }
       if(contact.trim().length==0){
           alert("手机必须填写");
           return;
       }
           $.ajax({
               url: '{{URL('message/save')}}',
               type: "post",
               data: {"title":userName,"contact":contact},
               success: function(data){
                   alert(data);
               }
           });
   }
</script>
@include('themes.default.foot')
@endsection
