@extends('themes.default.layouts')
@include('themes.default.top')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/list.css') }}">

    <div style="min-height:500px;text-align: center">用户指南</div>

    @include('themes.default.foot')
@endsection