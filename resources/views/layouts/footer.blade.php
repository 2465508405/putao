<?php
    $baseConfig = \App\Models\BaseConfig::first();
?>
<div class="footer clearfix">
    <div class="copyright">
        <div class="links w">
            <a href="/">首页</a>
            <span>|</span>
            <a href="/index1.html">马陆葡萄价格</a>
            <span>|</span>
            <a href="/index2.html">马陆葡萄品种</a>
            <span>|</span>
            <a href="/index3.html">马陆葡萄采摘园</a>
            <span>|</span>
            <a href="/index4.html">葡萄知识</a>
            <span>|</span>
            <a href="/consult">联系我们</a>
            <span>|</span>
            <a href="/payment">付款方式</a>
            <span>|</span>
            <a href="/instruction">批发说明</a>
            <span>|</span>
            <a href="/notice">发货须知</a>
        </div>
    </div>
    <div class="c-info">
        <p>版权所有 马陆葡萄直销网 （隶属于上海徽尚电子商务有限公司） 沪ICP备06038790号 Copyright 2007-2013 All Rights Reserved</p>
        @if($baseConfig)
        <p>地址:{{$baseConfig->address}}</p>
        @endif
    </div>
</div>