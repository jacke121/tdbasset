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
            <th>状态</th>
            <th>创建时间</th>
            <th class="text-right">操作</th>
        </tr>

        @foreach($zqList as $k=> $v)
            <tr id="zqList_{{ $v->id }}">
                <th scope="row">{{ $v->id }}</th>
                <td>{{ $v->zq_quote }}</td>
                <td>{{ App\Model\Zq::getZqType($v->types) }}</td>
                <td>{{ $v->o_province }} - {{ $v->o_city }} -{{ $v->o_contry }}</td>
                <td>@if(isset($v->status)&&($v->status>0))<font color="green">已通过</font>@else <font color="red">未通过</font>@endif</td>
                <td>{{ $v->created_at }}</td>
                <td class="text-right">
                    @if($v->status==0)
                    <a href="{{ url(route('member.zqm.edit',['id'=>$v->id,'types'=>App\Model\Zq::getZqTypeIn($v->types)])) }}">修改</a>
                    <a href="#" onclick="deleteZq({{$v->id}})">删除</a>
                    @else
                        <span title="已审核">修改</span>
                        <span title="已审核">删除</span>
                    @endif
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
        var isDelete = window.confirm("您确定要删除本条记录?删除后不能恢复！");
        if (isDelete) {
            $.ajax({
                url: '{{url('member/zqm/delete')}}',
                type: "delete",
                data: {'id': params, '_token': $('input[name=_token]').val()},
                success: function (data) {
                    alert(data);
                    window.location.reload();
                }
            });
        }
    }
</script>
@endsection