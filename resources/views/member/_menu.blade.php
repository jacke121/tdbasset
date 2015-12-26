<div class="panel panel-default">
    <div class="panel-heading">导航</div>

    <div class="panel-body text-center" style="height :200px">

        <ul class="nav nav-list"  style="height :200px;width:200px">
            <li>
                <a href="{{ url('/backend/system/index') }}">基本设置</a>
            </li>

            <li>
                <a href="{{ url(route('backend.nav.index')) }}">导航设置</a>
            </li>

            <li>
                <a href="{{ url(route('backend.links.index')) }}">友链管理</a>
            </li>

        </ul>
    </div>
</div>