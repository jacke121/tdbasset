@extends('backend.authe.common')
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript">
    $(function(){
        setindex("liauthe");
    });
</script>
@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">审批管理</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
@endsection
