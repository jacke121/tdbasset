@extends('member.zqm')

@section('content')

 <div class="zqNav">
    <h3>发布资产信息</h3>
     <ul class="list-inline">
         <li><a href="{{ URL('member/zqm/create?types=gr') }}">个人债务宝</a></li>
         <li><a href="{{ URL('member/zqm/create?types=gs') }}">企业商账通</a></li>
         <li> <a  href="{{ URL('member/zqm/create?types=fy') }}">判决执行宝</a></li>
     </ul>
</div>

@endsection