@extends('backend.content.common')

@section('content')
    <div class="col-md-10">
        <div class="panel panel-default">

            <div class="panel-heading">债务列表</div>

            <div class="panel-body">

                <div class="zq-panel">

                    <span id="infoLabel">

                    </span>

                    <ul class="types-list list-inline pull-right">
                        <label>真实姓名: <input id="iditemname" type="text" name="itemname" aria-controls="sample-table-2" value="{{isset($itemname)?$itemname:''}}"></label>
                        <input type="button"onclick="search();" class="btn btn-success" value="查询"/>
                    </ul>

                    <ul class="status-list list-inline pull-right">
                        <li><a>状态：</a></li>
                        <li><label class="checkbox-inline" for="status_0"><input id="status_0" class="status" type="radio" @if($status== -1)checked="checked"@endif name="status" value="-1">全部</label></li>
                        <li><label class="checkbox-inline" for="status_1"><input id="status_1" class="status"  @if($status==1)checked="checked"@endif type="radio" name="status" value="1">已审批</label></li>
                        <li><label class="checkbox-inline" for="status_2"><input id="status_2" class="status"  @if($status==0)checked="checked"@endif type="radio" name="status" value="0">未审批</label></li>
                    </ul>

                    <ul class="types-list list-inline pull-right">
                        <li><a>类型：</a></li>
                        <li><label class="checkbox-inline" for="typeId_0"><input id="typeId_0" class="typeId" type="radio" @if($typeId== 0)checked="checked"@endif name="typeId" value="0">全部</label></li>
                        <li><label class="checkbox-inline" for="typeId_1"><input id="typeId_1" class="typeId"  @if($typeId==1)checked="checked"@endif type="radio" name="typeId" value="1">个人</label></li>
                        <li><label class="checkbox-inline" for="typeId_2"><input id="typeId_2" class="typeId"  @if($typeId==2)checked="checked"@endif type="radio" name="typeId" value="2">企业</label></li>
                        <li><label class="checkbox-inline" for="typeId_3"><input id="typeId_3" class="typeId"  @if($typeId==3)checked="checked"@endif type="radio" name="typeId" value="3">判决</label></li>
                    </ul>

                </div>

                <table class="table table-hover table-top">
                    <meta name="_token" content="{!! csrf_token() !!}"/>
                    <tr>
                        <th>#</th>
                        <th>发起人</th>
                        <th>金额（元）</th>
                        <th>所属分类</th>
                        <th>所在地</th>
                        <th>收藏数</th>
                        <th>申请数</th>
                        <th>状态</th>
                        <th>创建时间</th>
                        <th class="text-right">操作</th>
                    </tr>

                    @foreach($zqList as $k=> $v)
                        <tr id="zqList_{{ $v->id }}">
                            <th scope="row">{{ $v->id }}</th>
                            <td>{{ App\Model\Member::getmemberNameBymemberId($v->uid)}}</td>
                            <td>{{ $v->zq_quote }}</td>
                            <td>{{ App\Model\Zq::getZqType($v->types) }}</td>
                            <td>{{ $v->o_province }} - {{ $v->o_city }} -{{ $v->o_contry }}</td>
                            <td><a href="{{url('backend/collects?zid='.$v->id)}}">{{ $v->collects }}</a></td>
                            <td><a href="{{url('backend/applys?zid='.$v->id)}}">{{ $v->applys }}</a></td>
                            <td>@if(isset($v->status)&&($v->status>0))<font color="green">已通过</font>@else <font color="red">未通过</font>@endif</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="text-right">
                                <a href="{{ url('backend/zq/check?id='.$v->id.'&types='.App\Model\Zq::getZqTypeIn($v->types)) }}">审核</a>
                                <a href="{{ url(route('backend.zq.edit',['id'=>$v->id,'types'=>App\Model\Zq::getZqTypeIn($v->types)])) }}">修改</a>
                                <a href="#" onclick="deleteZq({{$v->id}})">删除</a>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="pull-right">
                {!! $zqList->render() !!}
            </div>

            </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $(".typeId").click(function() {
                changeSelect();
            });
            $(".status").click(function() {
                changeSelect();
            });
            var val = $('input:radio[name="typeId"]:checked').closest("label").text();
            var status = $('input:radio[name="status"]:checked').closest("label").text();
            $("#infoLabel").html("<font color='blue'>" + val + "/" + status + "</font>");
        });

        function changeSelect(){
            var val = $('input:radio[name="typeId"]:checked').val();
            var status = $('input:radio[name="status"]:checked').val();
            window.location.href = "{{URL('backend/zq?typeId=')}}"+val+"&status="+status;
        }

        function search(){
            if($("#iditemname").val().length>0){
            }else{
                alert("用户名不能为空！");
                return;
            }
            window.location.href = "{{URL('backend/zq?itemname=')}}" + $("#iditemname").val();
        }

        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });

        function deleteZq(params) {
            var isDelete = window.confirm("您确定要删除本条记录?删除后不能恢复！");
            if (isDelete) {
                $.ajax({
                    url: '{{url('backend/zq/delete')}}',
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