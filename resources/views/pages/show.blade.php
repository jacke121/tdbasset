@extends('themes.default.layouts')
@include('themes.default.top')
@section('content')

    <h1 style="text-align: center; margin-top: 50px;">{{ $page->title }}</h1>
    <hr>
    <div id="date" style="text-align: right;">
        {{ $page->updated_at }}
    </div>
    <div id="content" style="padding: 50px;">
        <p>
            {{ $page->body }}
        </p>
    </div>
@endsection
