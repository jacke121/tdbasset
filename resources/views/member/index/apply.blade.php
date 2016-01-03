<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人中心</title>

<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/css/personal center.css')}}">
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
</head>

<body>
    @include('themes.default.top')
<!--main-->
    <div class="maincon">
        @include('member.left_nav')

<!--已申请信息-->
        <div class="mainr" >    
            <div class="ser_wei">
                <h3>查看已申请信息</h3>
                <ul class="chaul">
                    <li class="chaul1"><span class="icon"></span><span class="text">银行资产包</span></li>
                    <li class="chaul2 chaulg"><span class="icon"></span><span class="text">个人债务宝</span></li>
                    <li class="chaul3 chaulg"><span class="icon"></span><span class="text">企业商帐通</span></li>
                    <li class="chaul4 chaulg"><span class="icon"></span><span class="text">判决执行宝</span></li>
                </ul>
                <div class="wei_table">
                   <table>
                       <tbody>
                       <tr>
                           <th>#序号</th>
                           <th>金额</th>
                           <th>所属分类</th>
                           <th>操作</th>
                           <th>申请时间</th>
                       </tr>

                           @foreach($appList as $k=> $v)
                               <tr>
                                   <td scope="row">{{ $v->id }}</td>
                                   <td>{{ App\Model\Zq::getZqModelById($v->zid)->zq_quote }}</td>
                                   <td>{{ App\Model\Zq::getZqType($v->zid) }}</td>
                                   <td><a href="{{ url(route('zq.show',['id'=>$v->zid ])) }}" target="_blank">预览</a></td>
                                   <td>{{ $v->created_at }}</td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>

                    <div class="pull-right">
                        {!! $appList->render() !!}
                    </div>

                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
    
</div>
<!--foot部分-->
    @include('themes.default.foot')
</body>
</html>
