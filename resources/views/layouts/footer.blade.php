<?php
    $baseConfig = \App\Models\BaseConfig::first();
?>
<div class="footer clearfix">
    <div class="copyright" style="min-width:1200px;">
        <div class="links w" style="width:1200px;">
            <a href="/">首页</a>
            <span>|</span>
            <a href="/index2.html">马陆葡萄价格</a>
            <span>|</span>
            <a href="/index9.html">马陆葡萄采摘园</a>
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
    <div class="c-info" style="width:1200px;">
        <p>版权所有 马陆葡萄直销网 （隶属于上海徽尚电子商务有限公司） 沪ICP备06038790号 Copyright 2007-2013 All Rights Reserved</p>
        @if($baseConfig)
        <p>地址:{{$baseConfig->address}}</p>
        @endif
    </div>
</div>