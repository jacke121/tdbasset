@extends('member.zqm')

@section('content')
<div class="ad-apply">

    <table class="table table-hover table-top">
        <tr>
            <th>#</th>
            <th>申请人</th>
            <th>申请时间</th>
            <th class="text-right">联系方式</th>
        </tr>

        @foreach($applyList as $k=> $v)
            <tr id="zqList_{{ $v->id }}">
                <th scope="row">{{ $v->id }}</th>
                <td>{{ App\Model\Member::getmemberNameBymemberId($v->uid)}}</td>
                <td>{{ $v->created_at }}</td>
                <td class="text-right">
                   @if(App\Model\Member::getmemberInfoModelBymemberId($v->uid))
                        {{App\Model\Member::getmemberInfoModelBymemberId($v->uid)->itemname}}-
                        {{App\Model\Member::getmemberInfoModelBymemberId($v->uid)->mobile}}
                   @else

                   @endif
                </td>

            </tr>
        @endforeach
    </table>

</div>

<div class="pull-right">
    {!! $applyList->render() !!}
</div>

@if(sizeof($applyList)==0) <h5 class="text-center"> 暂无人申请此条信息 </h5>@endif
@endsection