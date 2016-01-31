@extends('backend.authe.common')
<script src="{{ asset('/js/jquery-1.11.3.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function(){
        setindex("liauthe");
        setmembertype("liwait");
    });
</script>
@section('content')
<div class="col-md-10">
    <div class="panel panel-default">
        <div class="panel-heading">新增会员</div>

        <div class="panel-body">
            {!! Form::open(['url' => ['backend/authe/memberadd'], 'method' => 'post','class'=>'form-horizontal']) !!}
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">用户名</label>
                <div class="col-sm-4">
                    {!! Form::text('name','', ['class' => 'form-control','placeholder'=>'category_name']) !!}
                    <font color="red">{{ $errors->first('cate_name') }}</font>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">手机号</label>
                <div class="col-sm-4">
                    {!! Form::text('as_name','', ['class' => 'form-control','placeholder'=>'as_name']) !!}
                    <font color="red">{{ $errors->first('as_name') }}</font>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit(' 新  增 ', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection