@extends('member.zqm')

@section('content')
@if(!fy){
   @include('admin.zq.gr')
}@else{
   @include('admin.zq.fy')
}@endif
@endsection