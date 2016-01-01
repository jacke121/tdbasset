@extends('member.app')
@section('modules')
    <script src="{{ asset('/js/PCASClass.js') }}"></script>
                    <form id="input_form" class="form-horizontal" action="{{ URL('zqm') }}" method="post">
                     @yield('content')
                    </form>
@endsection 