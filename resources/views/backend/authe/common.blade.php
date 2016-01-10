@extends('backend.app')
<style>
    #faceul{
        margin:0 0 0 2px;
        width:90%;
    }
    #faceul li{
        float:left;
        border:1px solid #b4b4b4;
        margin:5px 0 0 4px;
        height:202px;
        width:250px;
    }
    #faceul li a{

        display:block;
        height:52px;
        width:250px;
    }

    #faceul img{
        margin:5px 0 0 5px;
        border:none;
        height:180px;
        width:240px;
    }
</style>
@section('modules')
<div class="container-fluid">


    <div class="row">

        <div class="col-md-2">
            @include('backend.authe._menu')
        </div>

        @yield('content')

    </div>
</div>
@endsection