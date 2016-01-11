@extends('backend.authe.common')
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
<script type="text/javascript">
    $(function(){
        setindex("liauthe");
        setmembertype("liapproved");
    });
</script>
@section('content')
        <div class="col-md-10">
            <div class="panel panel-default">
                {!! Notification::showAll() !!}
                <div class="panel-heading">已认证会员列表</div>
                <div class="panel-body">
                    {{--<a class="btn btn-success" href="{{ URL::route('backend.cate.create')}}">创建分类</a>--}}
                    <table class="table table-hover table-top">
                        <tr>
                            <th>序号</th>
                            <th>业务方向</th>
                            <th>会员类型</th>
                            <th>会员名称</th>
                            <th>手机号</th>
                            <th>创建时间</th>
                            <th>账号状态</th>
                            <th class="text-right">操作</th>
                        </tr>
                        @foreach($member as $k=> $v)
                        <tr>
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ $v->roletype }}</td>
                            <td>{{ $v->typename }}</td>
                            <td>{{ $v->name}} {{ $v->itemname }}</td>
                            <td>{{ $v->mobile}}</td>
                            <td>{{ $v->created_at }}</td>
                            <td>{{ $v->authestr }}</td>
                            <td class="text-right">
                                {!! Form::open([
                                'url' => array('/backend/authe/freeze', $v->id),
                                 'method' => 'get',
                                'class'=>'btn_form'
                                ]) !!}
                                <button type="submit" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    冻结
                                </button>
                                {!! Form::close() !!}
                                {!! Form::open([
                                    'url' => array('/backend/authe/view', $v->id),
                                    'method' => 'get',
                                    'class'=>'btn_form'
                                ]) !!}

                                <button type="submit" class="btn btn-info">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    查看详情
                                </button>
                                {!! Form::close() !!}

                            </td>

                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
@endsection
