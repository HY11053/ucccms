<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="applicable-device" content="pc" />
    <meta name="csrf-token" content=" {{ csrf_token() }}">
    @if(Request::getrequesturi()=='/')
    <title>@yield('title')</title>
    @else
        <title>@yield('title')-58零食网</title>
    @endif
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="description" content="@yield('description')"/>
    <link href="/reception/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/reception/css/zxbj_bottom_slide.css" rel="stylesheet" type="text/css"/>
@yield('headlibs')
    <script type="text/javascript" src="/reception/js/jquery.min.js"></script>
    <script type="text/javascript" src="/reception/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/reception/js/index.js"></script>
</head>

<body>
@include('frontend.header')

<main>
@yield('main_content')
</main>
<footer>
<div class="footer">
    <div class="footer_nav"><a href="/about/" rel="nofollow">关于我们</a>　|　企业服务　|　人才招聘　|　<a href="/contact/" rel="nofollow">联系我们</a>　|　合作客户　|　<a href="/law/" rel="nofollow">法律声明</a>　|　友情链接　|　服务导航　|　<a href="/sitemap.xml" rel="nofollow">网站地图</a>　　|　加盟导航 sitemap</div>

    <div class="copyright">
        <p>58零食网友情提示：多打电话、多咨询、实地考察，可降低投资风险！</p>
        <p>Copyright © 2017 www.58lingshi.com Corporation, All Rights Reserved 上海莫卡网络科技有限公司 版权所有</p>
        <p><a href="http://www.miitbeian.gov.cn/" rel="nofollow"> 沪ICP备16055116号-11</a></p>
    </div>
        <div class="footernew footheight" style="width:1000px;" bosszone="footer">
            <div style="width:960px;">
                <p>
                    <span class="fl"><a href="http://www.cyberpolice.cn/wfjb/" target="_blank" rel="nofollow"><img width="36" height="43" border="0" alt="上海网警网络110" src="/reception/images/temp/816587.gif"></a></span>
                    <span class="fr"><a href="http://www.cyberpolice.cn/wfjb/" target="_blank" rel="nofollow">上海网警网络110<br>
		报警平台</a></span>
                </p>
                <p>
                    <span class="fl"><a href="http://www.police.sh.cn/shga/ygjw" target="_blank" rel="nofollow"><img width="36" height="42" border="0" alt="公共信息安全网络监察" src="/reception/images/temp/6743671.jpg"></a></span>
                    <span class="fr"><a href="http://www.police.sh.cn/shga/ygjw" target="_blank" rel="nofollow">公共信息安<br>
		全网络监察</a></span>
                </p>

                <p>
                    <span class="fl"><a href="http://www.miitbeian.gov.cn" target="_blank" rel="nofollow"><img width="35" height="43" border="0" alt="经营性网站备案信息" src="/reception/images/temp/ind36.gif"></a></span>
                    <span class="fr"><a target="_blank" class="lcblack" href="http://www.miitbeian.gov.cn" rel="nofollow">经营性网站<br>
		备案信息</a></span>
                </p>
                <p>
                    <span style="width:44px;" class="fl"><a href="http://www.12377.cn/" target="_blank" rel="nofollow"><img width="44" height="44" border="0" alt="中国互联网举报中心" src="/reception/images/temp/buliang.png"></a></span>
                    <span style="width:64px;" class="fr"><a class="lcblack" href="http://www.12377.cn/" target="_blank" rel="nofollow">中国互联网<br>
		举报中心</a></span>
                </p>
                <p>
                    <span style="width:44px;" class="fl"><a href="http://www.wenming.cn" target="_blank" rel="nofollow"><img width="44" height="42" border="0" alt="中国文明网传播文明" src="/reception/images/temp/wmlogo.gif"></a></span>
                    <span style="width:64px;" class="fr"><a class="lcblack" href="http://www.wenming.cn" target="_blank" rel="nofollow">中国文明网<br>传播文明</a></span>
                </p>
                <p style="width:128px;height:52px;border:0;">
                    <span style="padding:0;" class="fl"><a href="http://t.knet.cn/index_new.jsp" target="_blank" rel="nofollow"><img border="0" alt="诚信网站" src="/reception/images/temp/cxrz5.png"></a></span>
                </p>
                <p>
                    <span style="width:44px;" class="fl"><a href="http://www.sgs.gov.cn/shaic/" target="_blank" rel="nofollow"><img src="http://mat1.gtimg.com/www/images/qq2012/gswj2015.jpg" title="深圳市市场监督管理局企业主体身份公示" alt="深圳市市场监督管理局企业主体身份公示"></a></span>
                    <span style="width:64px;" class="fr"><a class="lcblack" href="http://www.sgs.gov.cn/shaic/" target="_blank" rel="nofollow">工商网监<br>电子标识</a></span>
                </p>
            </div>
        </div>
    <div class="wx"><img src="/reception/images/logo_wx.jpg" alt="微信"/></div>
</div>
<script type="text/javascript" src="/reception/js/search_ajax.js"></script>
<script src="/reception/js/comment.js"></script>
    <script type="text/javascript" src="/reception/js/side_fixed.js"></script>
<script src="/reception/js/GlobalProvinces.js" type="text/javascript"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?e40d7bbd754d9f32039af9c7515e047c";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>

</footer>
</body>
</html>
