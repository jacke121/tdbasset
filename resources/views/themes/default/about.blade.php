@extends('themes.default.layouts')
@include('themes.default.top')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/about.css') }}">

    <div class="content">
        <div class="center">
            <div class="con24">
                <!--左边模块 start-->
                <div class="con_l">
                    <ul>
                        <a href="#"><li class="cur1">{{$v->title}}</li>
                            <i class="cura"></i>
                        </a>
                        @foreach($aboutList as $k=> $v)
                            <a href="{{ url('about?id='.$v->id) }}"> <li id="about_nav_{{$v->id}}">{{$v->title}}</li><i ></i></a>
                        @endforeach
                    </ul>
                </div>
                <!--左边模块end-->

                <!--右边模块 start-->
                <div class="con_r">
                    <h2>
                        关于我们
                    </h2>
                    <div class="main">
                        <div class="wu">
                        </div>
                        {!! $about->content !!}
                    </div>
                </div>
                <!--右边模块 end-->
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    @include('themes.default.foot')

    <script type="text/javascript">
    $(document).ready(function(){
        var aboutPath = "{{$id}}";
        aboutPath = "#about_nav_"+aboutPath;
        $(aboutPath).addClass("cur1");
       });
    </script>
@endsection