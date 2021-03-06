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
                    <h3 class="listltit"><a href="javascript:;" target="_self" class="listltitx">首页</a> &gt;{{ App\Model\Category::getCategoryNameByCatId($article->cate_id)}}/详情</h3>

                    <h1 style="text-align: center; margin-top: 50px;">{{ $article->title }}</h1>
                    <hr>
                    <div id="content" style="padding: 50px;">
                        <p>
                            {!! $article->content !!}
                        </p>
                    </div>

                    <div id="date" style="text-align: right;">
                        {{ $article->updated_at }}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
