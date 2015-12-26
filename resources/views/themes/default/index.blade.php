@extends('themes.default.layouts')

@section('header')
    <title>{{systemConfig('title','Enda Blog') }} -lbg{{ systemConfig('subheading','Enda Blog') }}</title>
    <meta name="keywords" content="{{ systemConfig('seo_key') }}" />
    <meta name="description" content="{{ systemConfig('seo_desc') }}">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
<script src="../js/jquery-1.11.3.min.js"></script>
<script src="../js/index.js"></script>
<script >
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
})
</script>
    @include('themes.default.top')
@endsection

@section('content')
<section class="banner">
</section>

<!-- /.banner -->
<section class="container content">
<!--banner部分-->
<div class="slides">
    <div class="slideInner">
        <a href="#" style="background:url(../images/banner.jpg) no-repeat center top;"></a>
        <a href="#" style="background:url(../images/banner.jpg) no-repeat center top;"></a>
        <a href="#" style="background:url(../images/banner.jpg) no-repeat center top;"></a>
        
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
                <div class="notice_01">
                    <div style="float:left;padding:6px 10px 0 15px;"><img src="../images/notice_img.jpg" width="19" height="20"></div>
                    <span>网站公告&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <p style=" display:inline-block;">【用户新体验】债管家移动WAP端正式上线！</p>
                </div>
                <div class="notice_02">
                    <span>2015-10-08</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" style="color:#999999; font-size:14px; margin-right:20px;">更多>></a>
                </div>
            </div>
            <div class="figure">
                <ul class="figure_ul" style="width:264px;">
                    <li class="figure_li01"><b class="orange">537.97</b><p class="blue">亿元</p></li>
                    <li class="figure_li02"><span>发布金额</span></li>
                </ul>
                <ul class="figure_ul" style="width:249px;">
                    <li class="figure_li01"><b class="orange">537.97</b><p class="blue">亿元</p></li>
                    <li class="figure_li02"><span>已处置金额</span></li>
                </ul>
                <ul class="figure_ul" style="width:254px;">
                    <li class="figure_li01"><b class="orange">537.97</b><p class="blue">亿元</p></li>
                    <li class="figure_li02"><span>委托方入驻</span></li>
                </ul>
                <ul class="figure_ul" style="width:173px;">
                    <li class="figure_li01"><b class="orange">537.97</b><p class="blue">亿元</p></li>
                    <li class="figure_li02"><span>代理方入驻</span></li>
                </ul>
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
    <div style="width:100%; height:1302px; background:#F4F4F4;">
        <div class="center">
            <ul class="control">
                <li style="width:334px;"><a href="#" class="current">个人债务宝</a></li>
                <li style="width:333px;"><a href="#">企业商账通</a></li>
                <li style="width:331px;"><a href="#">判决执行宝</a></li>
            </ul>
            <div class="write">
                <ul class="write_ul">
                    <li style=" height:37px; line-height:37px; padding-left:76px;">
                        <span style="width:140px;">形式</span>
                        <span style="width:140px;">城市</span>
                        <span style="width:180px;">资产总额</span>
                        <span style="width:180px;">代理费率</span>
                        <span>逾期时间(天)</span>
                    </li>
                    <li>
                        <ul class="writeul_ul">
                            <li style="width:144px;">
                                <div class="shape">民间借贷</div>
                            </li>
                            <li style="width:165px;">
                                <div class="city">郑州市</div>
                            </li>
                            <li style="width:204px;">
                                <i class="blue">18.00</i>万元
                            </li>
                            <li style="width:176px;"><i class="blue">20</i>%</li>
                            <li style="width:133px;"><i class="blue">240</i>天</li>
                            <li style="width:126px;">
                                <div class="shape">招标中</div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="writeul_ul">
                            <li style="width:144px;">
                                <div class="shape">民间借贷</div>
                            </li>
                            <li style="width:165px;">
                                <div class="city">郑州市</div>
                            </li>
                            <li style="width:204px;">
                                <i class="blue">18.00</i>万元
                            </li>
                            <li style="width:176px;"><i class="blue">20</i>%</li>
                            <li style="width:133px;"><i class="blue">240</i>天</li>
                            <li style="width:126px;">
                                <div class="shape">招标中</div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="writeul_ul">
                            <li style="width:144px;">
                                <div class="shape">民间借贷</div>
                            </li>
                            <li style="width:165px;">
                                <div class="city">郑州市</div>
                            </li>
                            <li style="width:204px;">
                                <i class="blue">18.00</i>万元
                            </li>
                            <li style="width:176px;"><i class="blue">20</i>%</li>
                            <li style="width:133px;"><i class="blue">240</i>天</li>
                            <li style="width:126px;">
                                <div class="shape">招标中</div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="writeul_ul">
                            <li style="width:144px;">
                                <div class="shape">民间借贷</div>
                            </li>
                            <li style="width:165px;">
                                <div class="city">郑州市</div>
                            </li>
                            <li style="width:204px;">
                                <i class="blue">18.00</i>万元
                            </li>
                            <li style="width:176px;"><i class="blue">20</i>%</li>
                            <li style="width:133px;"><i class="blue">240</i>天</li>
                            <li style="width:126px;">
                                <div class="shape">招标中</div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <ul class="writeul_ul">
                            <li style="width:144px;">
                                <div class="shape">民间借贷</div>
                            </li>
                            <li style="width:165px;">
                                <div class="city">郑州市</div>
                            </li>
                            <li style="width:204px;">
                                <i class="blue">18.00</i>万元
                            </li>
                            <li style="width:176px;"><i class="blue">20</i>%</li>
                            <li style="width:133px;"><i class="blue">240</i>天</li>
                            <li style="width:126px;">
                                <div class="shape">招标中</div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
<!-- 一键免费发布 -->
            <div class="release">
                <div style=" font-size:22px; color:#323232; padding-left:11px; margin-bottom:22px;">一键免费发布</div>
                <div class="release_inp">
                    <div class="int">
                        <input type="text" placeholder="姓名" class="user" id="user">
                    </div>
                    <div class="int_1">
                        <input type="text" placeholder="电话" class="phone" id="phone">
                    </div>
                    <a href="javaScript:submitReserNow();" class="fabubtn">立即发布</a>
                    <p class="fabup">(评估师30分钟内回电)</p>
                </div>
            </div>
<!--新闻资讯-->          
            <div class="news">
                <div class="center">
                    <div class="newsLeft">
                        <div class="nlTit">
                            新闻资讯
                            <a href="#" style="float:right; color:#999999; font-size:12px;">+更多</a>
                        </div>
                        <div class="newsCon">
                            <div class="ncPic">
                                <img src="../images/zhibo.jpg">
                            </div>
                            <div class="ncTxt">
                                <a href="#" class="ta">■【新京报】青苔债管家之企业服务...</a>
                                <p class="tp">12月2日新京报中国青年经济学人论坛暨互联网金融论坛拉开序幕……</p>
                                <span style="float:right; font-size:12px; color:#999999;">2015-11-26</span>
                            </div>
                        </div>
                        <div class="newsCon">
                            <div class="ncPic">
                                <img src="../images/zhibo.jpg">
                            </div>
                            <div class="ncTxt">
                                <a href="#" class="ta">■【新京报】青苔债管家之企业服务...</a>
                                <p class="tp">12月2日新京报中国青年经济学人论坛暨互联网金融论坛拉开序幕……</p>
                                <span style="float:right; font-size:12px; color:#999999;">2015-11-26</span>
                            </div>
                        </div>
                        <div class="newsCon">
                            <div class="ncPic">
                                <img src="../images/zhibo.jpg">
                            </div>
                            <div class="ncTxt">
                                <a href="#" class="ta">■【新京报】青苔债管家之企业服务...</a>
                                <p class="tp">12月2日新京报中国青年经济学人论坛暨互联网金融论坛拉开序幕……</p>
                                <span style="float:right; font-size:12px; color:#999999;">2015-11-26</span>
                            </div>
                        </div>
                    </div>
                    <div class="newsRight">
                        <div class="nlTit">
                            债务常识
                            <a href="#" style="float:right; color:#999999; font-size:12px;">+更多</a>
                        </div>
                        <div class="newsCon01 newsCon">
                            <div class="ncTxt">
                                <a href="#" class="ta">■【新京报】青苔债管家之企业服务...</a>
                                <p class="tp">12月2日新京报中国青年经济学人论坛暨互联网金融论坛拉开序幕……</p>
                                <span style="float:right; font-size:12px; color:#999999;">2015-11-26</span>
                            </div>
                        </div>
                        <div class="newsCon">
                            <div class="ncTxt">
                                <a href="#" class="ta">■【新京报】青苔债管家之企业服务...</a>
                                <p class="tp">12月2日新京报中国青年经济学人论坛暨互联网金融论坛拉开序幕……</p>
                                <span style="float:right; font-size:12px; color:#999999;">2015-11-26</span>
                            </div>
                        </div>
                        <div class="newsCon">
                            <div class="ncTxt">
                                <a href="#" class="ta">■【新京报】青苔债管家之企业服务...</a>
                                <p class="tp">12月2日新京报中国青年经济学人论坛暨互联网金融论坛拉开序幕……</p>
                                <span style="float:right; font-size:12px; color:#999999;">2015-11-26</span>
                            </div>
                        </div>
                        <div class="newsCon">
                            <div class="ncTxt">
                                <a href="#" class="ta">■【新京报】青苔债管家之企业服务...</a>
                                <p class="tp">12月2日新京报中国青年经济学人论坛暨互联网金融论坛拉开序幕……</p>
                                <span style="float:right; font-size:12px; color:#999999;">2015-11-26</span>
                            </div>
                        </div>
                        <div class="newsCon">
                            <div class="ncTxt">
                                <a href="#" class="ta">■【新京报】青苔债管家之企业服务...</a>
                                <p class="tp">12月2日新京报中国青年经济学人论坛暨互联网金融论坛拉开序幕……</p>
                                <span style="float:right; font-size:12px; color:#999999;">2015-11-26</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--合作伙伴-->
    <div class="hezuo">
        <div class="center">
            <div class="hezuoTitle">合作伙伴</div>
            <div class="hl_main5_content">
                <a class="hl_scrool_leftbtn" href="#"></a>
                <a class="hl_scrool_rightbtn" href="#"></a>
                <div class="hl_main5_content1">
                    <ul style="margin-left: 0px;">
                        <li><a href="#"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                        <li><a href="#" target="_blank" title="" rel="nofollow"><img src="../images/baidu.jpg"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="columns">
        <div class="column two-thirds" >
            <ol class="repo-list">
                @if(!empty($articleList))
                    @foreach($articleList['data'] as $article)
                        <li class="repo-list-item">
                            <h3 class="repo-list-name">
                                <a href="{{ route('article.show',array('id'=>$article->id)) }}" title="{{ $article->title }}">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            <p class="repo-list-description">
                                {{ strCut(conversionMarkdown($article->content),80) }}
                            </p>
                            <p class="repo-list-meta">
                                <span class="octicon octicon-calendar"></span>{{ $article->created_at->format('Y-m-d') }}
                            </p>
                        </li>
                    @endforeach
                @endif
            </ol>
        </div>
        <div class="column one-third">
            @include('themes.default.right')
        </div>
    </div>
   
    <div class="pagination text-align">
        <nav>
           {!! $articleList['page']->render($page) !!}
        </nav>
    </div>
    <!-- /pagination -->
</section>
<!-- /section.content -->
 <!--foot部分-->
       @include('themes.default.foot')
@endsection
