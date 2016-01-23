@extends('themes.default.layouts')
@include('themes.default.top')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
    <section class="container content">

        <div class="columns about">
            <div class="row">
               <div class="col-sm-2">
                   <ul class="list-unstyled about_nav">
                       <li class="navTitle"><a>关于我们</a></li>
                       @foreach($aboutList as $k=> $v)
                       <li id="about_nav_{{$v->id}}"><a href="{{ url(route('about.show',['id'=>$v->id ])) }}">{{$v->title}}</a></li>
                       @endforeach
                   </ul>
               </div>
                <div class="col-sm-10">
                    {!! $about->content !!}
                </div>
            </div>
            </div>
    </section>
    
    <div class="clearfix"></div>
    @include('themes.default.foot')

    <script type="text/javascript">
    $(document).ready(function(){
        var aboutPath = $.trim(window.location.pathname.split('/')[2]);
        aboutPath = "#about_nav_"+aboutPath;
        $(aboutPath).addClass("current");
       });
    </script>
@endsection