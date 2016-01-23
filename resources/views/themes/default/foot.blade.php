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
                <div><img src="{{asset('/images/bigphone.jpg')}}" width="38" height="58" style=" position:absolute; top:15px; left:-3px;"></div>
                <h3 class="foot4h">
                    服务热线<br> <span class="foot4p1">400-058-9555</span>
                </h3>
                <p>周一到周五9:00-18:00</p>
                <p class="foot4p3">
                    <div style="float:left;padding-right:5px;"><img src="{{asset('/images/bigzuobiao.jpg')}}" width="13" height="21"></div>
                    企业坐标
                </p>
                <p class="foot4p4">北京市朝阳区三元西桥时间国际八号楼南区1910</p>
            </div>
            <div class="foot3">
                <h3 class="foot3h">官方微信</h3>
                <img src="{{asset('/images/erweima.jpg')}}" width="106" height="106">
                  <div>
                <a href="javascript:window.scrollTo(0,0)" >TOP</a>
            </div>
            </div>
        </div>
    </div>
   
    <script type="text/javascript">
        $(document).ready(function(){
            var path = $.trim(window.location.pathname.split('/')[1]);
            if(path==""){path ="home";};
            path = "#nav_"+path;
            $(path).addClass("current");
        });
    </script>