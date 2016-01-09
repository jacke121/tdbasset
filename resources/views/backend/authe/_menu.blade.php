<div class="panel panel-default">
    <div class="panel-heading">导航</div>

    <div class="panel-body text-center">

        <ul class="nav nav-list">
            <li>
                <a href="/backend/authe/registerd">未认证会员</a>
            </li>
            <li>
                <a href="/backend/authe/awaiting">待审批会员</a>
            </li>

            <li>
                <a href="/backend/authe/approved">已审批会员</a>
            </li>

            <li>
                <a href="{{URL::route('backend.tags.index')}}">标签管理</a>
            </li>

        </ul>
    </div>
</div>