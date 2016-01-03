@extends('member.zqm')

@section('content')

<div>
    <div class="pull-right btn-margin">
        <a class="btn btn-success" href="{{url('member/zqm/index')}}"> + 添加 </a>
    </div>

    <table class="table table-hover table-top">
        <meta name="_token" content="{!! csrf_token() !!}"/>
        <tr>
            <th>#</th>
            <th>金额（元）</th>
            <th>所属分类</th>
            <th>所在地</th>
            <th>创建时间</th>
            <th class="text-right">操作</th>
        </tr>

        @foreach($zqList as $k=> $v)
            <tr id="zqList_{{ $v->id }}">
                <th scope="row">{{ $v->id }}</th>
                <td>{{ $v->zq_quote }}</td>
                <td>{{ App\Model\Zq::getZqType($v->types) }}</td>
                <td>{{ $v->o_province }} - {{ $v->o_city }} -{{ $v->o_contry }}</td>
                <td>{{ $v->created_at }}</td>
                <td class="text-right">
                    <a href="{{ url('member/zqm/check?id='.$v->id.'&types='.App\Model\Zq::getZqTypeIn($v->types)) }}">审核</a>
                    <a href="{{ url(route('member.zqm.edit',['id'=>$v->id,'types'=>App\Model\Zq::getZqTypeIn($v->types)])) }}">修改</a>
                    <a href="#" onclick="deleteZq({{$v->id}})">删除</a>
                </td>

            </tr>
        @endforeach
    </table>

    <div class="pull-right">
        {!! $zqList->render() !!}
    </div>
</div>

<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });

    function deleteZq(params){
        $.ajax({
            url: '{{url('member/zqm/delete')}}',
            type: "delete",
            data: {'id':params, '_token': $('input[name=_token]').val()},
            success: function(data){
                alert(data);
                window.location.reload();
            }
        });
    }
</script>
@endsection