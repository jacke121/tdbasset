@extends('member.zqm')

@section('content')

 <div class="zqNav chaul">
    <h3 class="text-center margin-bootom-len">发布资产信息</h3>
     <ul class="chaul">
         <li class="chaul2 chaulg"><span class="icon"></span><span class="text"><a href="{{ URL('member/zqm/create?types=gr') }}">个人债务宝</a></span></li>
         <li class="chaul3 chaulg"><span class="icon"></span><span class="text"><a href="{{ URL('member/zqm/create?types=gs') }}">企业商账通</a></span></li>
         <li class="chaul4 chaulg"><span class="icon"></span><span class="text"><a  href="{{ URL('member/zqm/create?types=fy') }}">判决执行宝</a></span></li>
     </ul>
</div>

@endsection