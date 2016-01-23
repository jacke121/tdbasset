@extends('themes.default.layouts')
@include('themes.default.top')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/news_list.css') }}">

    <div class="new_list">
        <div class="center">
            <img src="{{ asset('/images/news_list_banner.png') }}" width="1001" height="200">
            <div class="new_listcon">
                <!-- 左侧 -->
                <div class="list_xiangl fl">
                    <img src="{{ asset('/images/new_list_menu.png') }}">
                    <ul class="newlistmenu_ul">
                        @foreach($articleCatList as $k=> $v)
                            <li><a href="{{URL('article?cateId='.$v->id)}}">{{$v->cate_name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!--咨询列表-->
                <div class="new_listconl fl">
                    <h3 class="listltit"><a href="javascript:;" target="_self" class="listltitx">首页</a> &gt;{{ App\Model\Category::getCategoryNameByCatId($cateId)}}</h3>
                    <div>
                        @foreach($articleList as $k=> $v)
                        <div class="nlist">
                            <h3>
                                <a target="_blank" href="{{ url(route('article.show',['id'=>$v->id ])) }}" >
                                    <p class="tp">{{$v->title}}</p>
                                    <span class="list_time">{{$v->created_at}}</span></a></h3>
                            <p>
                                {{isset($v->tags)?$v->tags:''}}
                            </p>
                        </div>
                        @endforeach
                            @if(sizeof($articleList)==0) <h3 class="text-center"> 此项暂时没有数据 </h3>@endif
                    </div>
                    <!--分页-->
                    <div class="container">
                        <div class="pull-right">
                            {!! $articleList->render() !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection