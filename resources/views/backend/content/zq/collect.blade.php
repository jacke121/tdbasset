@extends('backend.content.common')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">

            <div class="panel-heading">收藏列表</div>

            <div class="panel-body">

                <table class="table table-hover table-top">
                    <meta name="_token" content="{!! csrf_token() !!}"/>
                    <tr>
                        <th>#</th>
                        <th>收藏人</th>
                        <th>收藏时间</th>
                        <th class="text-right">操作</th>
                    </tr>

                    @foreach($collectList as $k=> $v)
                        <tr id="zqList_{{ $v->id }}">
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ App\Model\Member::getmemberNameBymemberId($v->uid)}}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">
                                <a href="#" onclick="deleteCollect({{$v->id}})">删除</a>
                            </td>

                        </tr>
                    @endforeach
                </table>

             </div>

            <div class="pull-right">
                {!! $collectList->render() !!}
            </div>

            @if(sizeof($collectList)==0) <h5 class="text-center"> 暂无人收藏此条信息 </h5>@endif

        </div>
    </div>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        function deleteCollect(params) {
            var isDelete = window.confirm("您确定要删除本条记录?删除后不能恢复！");
            if (isDelete) {
                $.ajax({
                    url: '{{url('backend/collects/delete')}}',
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