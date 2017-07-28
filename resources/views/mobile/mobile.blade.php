<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta name="wap-font-scale" content="no"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="applicable-device" content="mobile">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content=" {{ csrf_token() }}">
    <title>@yield('title')-58零食网</title>
    <meta name="keywords" content="@yield('keywords')"/>
    <meta name="description" content="@yield('description')"/>
    <link rel="canonical" href="{{env('APP_URL')}}{{Request::getrequesturi()}}" >
    <link rel="stylesheet" type="text/css" href="/mobiles/css/css.css">
    <script type="text/javascript" src="/mobiles/js/jquery.min.js"></script>
    <script type="text/javascript" src="/mobiles/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="/mobiles/js/index.js"></script>
</head>

<body>
<div class="viewport">
@include('mobile.header')
@yield('main_content')
    <div class="index_message">
        <div class="message_tit"><span>在线留言</span><em>(客服将第一时间给您回电)</em></div>
        <div class="mfdh clearfix">
            <form onsubmit="return false;" >
                <ul>
                    <li>
                        <label class="p-tips">姓名：</label>
                        <input name="name" type="text"  class="name" id="name_msg" placeholder="如 王先生" value="">
                    </li>
                    <li>
                        <label class="p-tips">手机：</label>
                        <input name="phoneno" type="text" class="name" id="phone_msg" placeholder="如 13888888888" value="">
                    </li>
                    <li>
                        <label class="p-tips">留言：</label>
                        <textarea class="txt" name="note"  id="note_msg" cols="" rows="" placeholder="我对此项目很感兴趣，请联系我。"></textarea>
                    </li>
                </ul>
                <input name="submit" id="submit_sub" type="submit" class="anniu" value="立即提交留言">
            </form>
        </div>
    </div>
    <div class="footer">
        <div class="footer_nav">
            <a href="/mobilesitemap.xml">网站地图</a>|<a href="/about/" rel="nofollow">关于我们</a>|<a href="/law/" rel="nofollow">免责声明</a>|<a href="{{env('APP_URL')}}">电脑版</a>
        </div>
        <div class="copyright">
            <p>58零食网 沪ICP备16055116号-11</p>
            <p>上海莫卡网络科技有限公司</p>
        </div>
    </div>
</div>

<div class="fixed_nav">
    <ul>
        <li>
            <a href="/">
                <i class="icon1"></i>
                <p>首页</p>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)">
                <i class="icon2"></i>
                <p>在线咨询</p>
            </a>
        </li>
        <li>
            <a href="javascript:void(0)" id="js_popup">
                <i class="icon3"></i>
                <p>快速留言</p>
            </a>
        </li>
    </ul>
</div>

<div class="popup_mask">
    <div class="popup">
        <div class="hd">
            <span class="tit">快速留言</span>
            <em>(客服将第一时间给您回电)</em>
            <a class="popup_close" href="#">关闭</a>
        </div>
        <div class="bd">
            <ul>
                <li>
                    <label for="msg_name" class="label">姓名：</label>
                    <input id="msg_name" class="input_bk" type="text" id="msg_name" name="msg_name" value="" placeholder="如 万先生">
                </li>
                <li>
                    <label for="msg_phone" class="label">手机：</label>
                    <input id="msg_phone" class="input_bk" type="text" id="msg_phone" name="msg_phone" value="" placeholder="如 13888888888">
                </li>
                <li>
                    <label for="msg_cont" class="label">留言：</label>
                    <textarea id="msg_cont" class="textarea_bk" type="text" id="msg_cont" name="msg_cont" value="" placeholder="我对此项目很感兴趣，请联系我。"></textarea>
                </li>
                <li>
                    <input type="submit" value="立即提交留言" id="msg_sub" class="btn">
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
