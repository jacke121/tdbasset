<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>个人中心</title>
<link rel="stylesheet" type="text/css" href="{{asset('/css/personal center.css')}}">
<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
</head>

<body>
    @include('themes.default.top')
<!--main-->
    <div class="maincon">
        @include('member.left_nav')
<!--系统消息-->
	<div class="mainr" >
        <div class="ser_wei">
            <h3>系统消息</h3>
              <input type="hidden" value="1">
              <input type="hidden" value="1">
              <input type="hidden" value="1">
            <div class="ser_weicon" style="display: none;">
               <p> 亲、目前暂无任何系统信息！<br>再去<a href="index.html">首页</a>转转吧~</p>
            </div>
            <div class="wei_table" id="openTable">
               <table>
                    <tbody>
                        <tr class="tabletit">
                           <td>时间</td>
                           <td>消息名称</td>
                           <td>内容</td>
                           <td>操作</td>
                        </tr>
                         <tr class="tcur" id="tr0" style="color: gray;">
                            <td>2015-11-27</td>
                            <td><span>【注册信息】</span></td>
                            <td><p class="content">欢迎您成为投贷宝的临时会员，请牢记您的登录账号：用户名;请进行资质认证成为正式会员参与平台投标服务哦</p></td>
                            <td><a href="javascript:void(0);" class="look">查看</a><a href="javaScript:void(0)" class="del">删除消息</a></td>
                        </tr>
                    </tbody>
                </table>
                <div id="pager">
                    <ul class="pages">
                        <li class="lispe" id="pageCountInfo">共1条记录  第1/1页</li>
                        <li class="pg下一页 pgEmpty">首页</li>
                        <li class="pg下一页 pgEmpty">上一页</li>
                        <li class="page-number pgCurrent">1</li>
                        <li class="pg下一页 pgEmpty">下一页</li>
                        <li class="pg下一页 pgEmpty">尾页</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  
</div>
<!-- 弹出层-->
        <div class="tan" style="display:none;">
            <p class="tan_icon">
            <span class="dui" style="display: none;"></span>
            <span class="cuo"></span>
            </p>
            <p class="tants" id="alertInfo" style="display: block;">您的认证信息已提交,我们会在一个工作小时内为您完成审核</p>
            <p class="tanp">
            <input type="submit" class="tanbtn" value="确认">
            </p>
        </div>
    </div>
    <div style="clear:both;"></div>
        </div>
    </div>
    </div>
        <div style="clear:both;"></div>


    
</div>








<!--foot部分-->
	<div class="foot">
		<div class="footcon">
			<div class="foot1">
				<h3 class="footh3">关于某某</h3>
				<ul>
					<li><a href="#">公司简介</a></li>
					<li><a href="#">隐私规则</a></li>
					<li><a href="#">投资机构</a></li>
					<li><a href="#">人才招聘</a></li>
				</ul>
				<ul>
					<li><a href="#">产品介绍</a></li>
					<li><a href="#">联系我们</a></li>
					<li><a href="#">法律声明</a></li>
					<li><a href="#">帮助中心</a></li>
				</ul>
			</div>
			<div class="foot2">
            	<div><img src="../images/bigphone.jpg" width="38" height="58" style=" position:absolute; top:15px; left:-3px;"></div>
				<h3 class="foot4h">
					服务热线<br> <span class="foot4p1">400-058-9555</span>
				</h3>
				<p>周一到周五9:00-18:00</p>
				<p class="foot4p3">
					<div style="float:left;padding-right:5px;"><img src="../images/bigzuobiao.jpg" width="13" height="21"></div>
					企业坐标
				</p>
				<p class="foot4p4">北京市朝阳区三元西桥时间国际八号楼南区1910</p>
			</div>
			<div class="foot3">
				<h3 class="foot3h">官方微信</h3>
				<img src="../images/erweima.jpg" width="106" height="106">
			</div>
		</div>
	</div>
	<div class="footlink">
    	<div style=" height:40px; line-height:40px; padding:0 0 0 370px;">
            <a href="#">友情链接</a>
            <a href="#">百度</a>
            <a href="#">清债公司</a>
            <a href="#">清欠公司</a>
            <a href="#">思科培训</a>
        </div>
	</div>
</body>
</html>
