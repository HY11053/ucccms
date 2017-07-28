@extends('frontend.frontend')
@section('title') {{$thisarticleinfos->title}} @stop
@section('keywords') {{$thisarticleinfos->keywords}} @stop
@section('description')  {{$thisarticleinfos->description}} @stop
@section('headlibs')
    <meta name="Copyright" content="58零食网-{{env('APP_URL')}}"/>
    <meta name="author" content="58零食网" />
    <meta http-equiv="mobile-agent" content="format=wml; url={{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=html5; url={{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" />
    <link rel="alternate" media="only screen and(max-width: 640px)" href="{{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" >
    <link rel="canonical" href="{{env('APP_URL')}}{{Request::getrequesturi()}}"/>
    <meta property="og:type" content="article"/>
    <meta property="article:published_time" content="{{$thisarticleinfos->created_at}}+08:00" /> <meta property="og:image" content="{{env('APP_URL')}}{{$thisarticleinfos->litpic}}"/>
    <meta property="article:author" content="58零食网" />
    <meta property="article:published_first" content="58零食网, {{env('APP_URL')}}{{Request::getrequesturi()}}" />
    <link rel="stylesheet" type="text/css" href="/reception/css/news.css"/>
@stop
@section('main_content')
@include('frontend.position')
<div class="main clearfix">
    <div class="center_list clearfix">
        <div class="news_center">
            <div class="ny_message">
                <h1> {{$thisarticleinfos->title}}</h1>
                <div class="ny_message-js"> 时间：{{$thisarticleinfos->created_at}} <span>来源：58零食网</span> <span>浏览：{{$thisarticleinfos->click}}</span> </div>
            </div>
            <div class="body_tit clearfix">
                {!! $thisarticleinfos->article->body !!}
            </div>
            <div class="fenxiang">
                <div class="fenxiangdao">分享到：</div>
                <div class="bdsharebuttonbox" data-tag="share_1">
                    <a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                    <a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                    <a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                </div>
                <div class="nr_biaoqian"><b>标签：</b>{{$thisarticleinfos->tags}}</div>
            </div>
            <script>
                window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
            </script>
            @include('frontend.comment')
            <div class="shangxiapian">
                <p>上一篇：@if(isset($prev_article)) <a href="/{{$prev_article->arctype->real_path}}/{{$prev_article->id}}.shtml" title="{{$prev_article->title}}">{{$prev_article->title}}</a> @else 没有了 @endif </p>
                <p >下一篇：@if(isset($next_article)) <a href="/{{$next_article->arctype->real_path}}/{{$next_article->id}}.shtml" title="{{$next_article->title}}">{{$next_article->title}}</a> @else 没有了 @endif </p>
            </div>
            <div class="xg_news">
                <div class="title"><strong>{{$thisarticleinfos->tags}}资讯</strong></div>
                <div class="xw">
                    <ul class="clearfix">
                        @foreach($xgnews as $xgnew)
                        <li><em>{{$xgnew->updated_at}}</em><a href="/{{$xgnew->arctype->real_path}}/{{$xgnew->id}}.shtml" title="{{$xgnew->title}}">{{$xgnew->title}} </a></li>
                      @endforeach
                       </ul>
                </div>
            </div>
        </div>
        <div class="new_right">
            <div class="new_bt">
                <h3> <i></i> 零售店加盟排行榜 </h3>
                <div class="rank_bd">
                    <ul>
                        @foreach($topbrands as $index=>$topbrand)
                            @if($index==0)
                                <li class="top"> <a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml" target="_blank" title="{{$topbrand->shorttitle}}"><i class="num">{{$index+1}} </i> <img src="{{$topbrand->litpic}}" alt="{{$topbrand->shorttitle}}" ></a>
                                    <div class="cont">
                                        <p><a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml" target="_blank">{{$topbrand->shorttitle}}</a></p>
                                        <p><span>投资金额：</span><i>{{$topbrand->article->brandpay}}</i></p>
                                        <p class="btn"><a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml">查看详情</a></p>
                                    </div>
                                </li>
                            @else

                                <li class="top"> <i class="num">{{$index+1}}</i> <span class="name"><a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml" target="_blank" title="{{$topbrand->shorttitle}}">{{$topbrand->shorttitle}}</a></span> <span class="price">{{$topbrand->article->brandpay}}</span> </li>
                            @endif

                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="new_bt">
                <h3> <i></i> 品牌新闻 </h3>
                <div class="bts">
                    <div class="common">
                        <ul>
                            @foreach($brandnews as $brandnew)
                            <li><a href="/{{$brandnew->arctype->real_path}}/{{$brandnew->id}}.shtml" target="_blank" title="{{$brandnew->title}}">{{$brandnew->title}}</a></li>
                                @endforeach
                       </ul>
                    </div>
                </div>
            </div>

            <div class="new_bt">
                <h3> <i></i> 快速查询入口 </h3>
                <div class="kuishurk">

                    @foreach(explode(',',$thisarticleinfos->article->bdxg_search) as $bdxg_search)
                    <span>{{$bdxg_search}}</span>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@stop