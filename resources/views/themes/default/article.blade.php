@extends('themes.default.layouts')
@include('themes.default.top')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">
    <h1 style="text-align: center; margin-top: 50px;">{{ $article->title }}</h1>
    <hr>
    <div id="content" style="padding: 50px;">
        <p>
            {{ $article->content }}
        </p>
    </div>

    <div id="date" style="text-align: right;">
        {{ $article->updated_at }}
    </div>
@endsection
