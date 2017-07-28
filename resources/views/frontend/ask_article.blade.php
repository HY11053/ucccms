@extends('frontend.frontend')
@section('title'){{$thisaskinfo->title}}@stop
@section('keywords') {{$thisaskinfo->title}} @stop
@section('description') {{str_limit(strip_tags($thisaskinfo->body),'77','')}}@stop
@section('headlibs')
    <link rel="stylesheet" type="text/css" href="/reception/css/news.css"/>
@stop
@section('main_content')
    @include('frontend.position')
    <div class="main clearfix">
        <div class="center_list clearfix">
            <div class="inter">

                <div class="interl">
                    <div class="interl1"><a href="#">{{$thisaskinfo->title}}</a></div>
                    <div class="interl2">{!! $thisaskinfo->body !!}</div>
                    <div class="interl3">
                        <i>{{$thisaskinfo->tags}}&nbsp;&nbsp;|&nbsp;&nbsp;浏览 {{$thisaskinfo->viewnum}} 次</i>
                        <span>{{\Carbon\Carbon::parse($thisaskinfo->created_at)->diffForHumans()}}</span>
                    </div>
                </div>


                <div class="interlo">
                    <div class="interlo_top">
                        <div class="interlo_topl">{{count($thisaskanswers)}}个回答</div>
                        <div class="interlo_topr">
                            <i class="ba"><a href="#">默认留言</a></i>
                            <i><a href="#">时间排序</a></i>
                        </div>
                    </div>
                </div>
                @foreach($thisaskanswers as $thisaskanswer)
                    <div class="interlonr">
                        <div class="interlonr_top">
                            <div class="interlo_nrl"><a href="#"><img src="/AdminLTE/dist/img/avatar{{rand(2,5)}}.png" /></a></div>
                            <div class="interlo_nrr">
                                <ul>
                                    <li><a href="#">{{$thisaskanswer->user->name}}</a></li>
                                    <li>{{$thisaskanswer->created_at}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="interlo_con">
                            {!! $thisaskanswer->content !!}
                        </div>
                        <div class="interlo_btm">
                            <i>{{$thisaskanswer->user->name}} 回答于{{\Carbon\Carbon::parse($thisaskanswer->created_at)->diffForHumans()}}&nbsp;&nbsp;</i>
                            <span> <div class="fx">
                    <div class="fxd">分享到：</div>
                    <div class="bdsharebuttonbox" data-tag="share_1">
                        <a href="#" class="bds_qzone1" data-cmd="qzone" title="分享到QQ空间"></a>
                        <a href="#" class="bds_tsina1" data-cmd="tsina" title="分享到新浪微博"></a>
                        <a href="#" class="bds_weixin1" data-cmd="weixin" title="分享到微信"></a>
                    </div>
                    <script>
                        window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                    </script>
                </div></span>
                        </div>
                    </div>
                @endforeach

                {{Form::open(array('route' => array('answercrtete',$thisaskinfo->id),'method' => 'put'))}}
                <div class="internoter">
                <p>我有更好答案</p>
                @include('vendor.ueditor.assets')
                    <script type="text/javascript">
                        var ue = UE.getEditor('container',{
                            toolbars: [
                                ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright']
                            ],
                            elementPathEnabled: false,
                            enableContextMenu: false,
                            autoClearEmptyNode:true,
                            wordCount:false,
                            imagePopup:false,
                            initialFrameHeight:150,
                            autotypeset:{ indent: true,imageBlockLine: 'center' }
                        });
                        ue.ready(function() {
                            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                        });
                    </script>
                    <script id="container" name="content" type="text/plain"></script>
                    <button type="submit"  class="btn btn-md bg-maroon">提交问答</button>
                    <div class="clear"></div>
                    @if ($errors->has('content'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                    @endif
                </div>

                {!! Form::close() !!}
            </div>

            <div class="new_right">
                <div class="new_bt">
                    <h3> <i></i> 本周热门 </h3>
                    <div class="rank_bd rank_bd1">
                        <ul>
                            @foreach($hotasks as $index=>$hotask)
                                <li class="top"> <i class="num">{{$index+1}}</i> <span class="name"><a href="/ask/{{$hotask->id}}.shtml" target="_blank" title="{{$hotask->title}}">{{$hotask->title}}</a></span> <span class="price">{{$hotask->answernum}}回答</span> </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="new_bt">
                    <h3> <i></i> 零售店加盟排行榜 </h3>
                    <div class="rank_bd">
                        <ul>

                            @foreach($topbrands as $index=>$topbrand)
                                @if($index==0)
                                    <li class="top"> <a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml" target="_blank" title="{{$topbrand->article['brandname']}}"><i class="num">{{$index+1}} </i> <img src="{{$topbrand->litpic}}" alt="{{$topbrand->article['brandname']}}" ></a>
                                        <div class="cont">
                                            <p><a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml" target="_blank">{{$topbrand->article['brandname']}}</a></p>
                                            <p><span>投资金额：</span><i>{{$topbrand->article->brandpay}}</i></p>
                                            <p class="btn"><a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml">查看详情</a></p>
                                        </div>
                                    </li>
                                @else

                                    <li class="top"> <i class="num">{{$index+1}}</i> <span class="name"><a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml" target="_blank" title="{{$topbrand->article['brandname']}}">{{$topbrand->article['brandname']}}</a></span> <span class="price">{{$topbrand->article->brandpay}}</span> </li>
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
                                @foreach($latesnews as $latesnew)
                                    <li><a href="/{{$latesnew->arctype->real_path}}/{{$latesnew->id}}.shtml" target="_blank" title="{{$latesnew->title}}">{{$latesnew->title}}</a></li>
                                @endforeach </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script src="http://www.shangjicms.com/vendor/ueditor/third-party/highcharts/highcharts.js"></script>
    <script src="http://www.shangjicms.com/vendor/ueditor/dialogs/charts/chart.config.js"></script>
    <script src="http://www.shangjicms.com/vendor/ueditor/dialogs/internal.js"></script>
    <script src="/vendor/ueditor/dialogs/charts/charts.js"></script>

@stop