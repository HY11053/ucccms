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
    <link rel="stylesheet" type="text/css" href="/reception/css/news.css"/>
@stop
@section('main_content')
@include('frontend.position')

<div class="main clearfix">
    <div  class="layout2">
        <div class="brand_slide">
            <ul class="bigImg">
                @foreach( array_filter(explode(',',$thisarticleinfos->article['imagepics'])) as $pics)
                <li><img src="{{$pics}}" alt="【{{$thisarticleinfos->article['brandname']}}】"/></li>
                @endforeach
            </ul>
            <div class="smallScroll"><a class="sPrev" href="javascript:void(0)"></a>
                <div class="smallImg">
                    <ul>
                        @foreach( array_filter(explode(',',$thisarticleinfos->article['imagepics'])) as $pics)
                            <li><img src="{{$pics}}" alt="【{{$thisarticleinfos->article['brandname']}}】"/></li>
                        @endforeach


                    </ul>
                </div>
                <a class="sNext" href="javascript:void(0)"></a> </div>
        </div>

        <div class="info">
            <h1 class="tit">【{{$thisarticleinfos->article['brandname']}}】</h1>
            <div class="detail">
                <ul>
                    <li>投资金额：<span class="price">{{$thisarticleinfos->article['brandpay']}}</span></li>
                    <li>所属行业：<span class="crumbs">零食</span></li>
                </ul>
            </div>
            <div class="tit_pice">
                <ul>
                    <li>成立时间：<span class="price">{{$thisarticleinfos->article['brandtime']}}</span></li>
                    <li>门店总数：<span class="price">{{$thisarticleinfos->article['brandnum']}}</span></li>
                    <li>加盟区域：<span class="price">{{$thisarticleinfos->article['brandarea']}}</span></li>
                    <li>适合人群：<span class="price">{{$thisarticleinfos->article['brandperson']}}</span></li>
                    <li>经营范围：<span class="price">{{$thisarticleinfos->article['brandmap']}}</span></li>
                    <li>店铺面积：<span class="price">{{$thisarticleinfos->article['acreage']}}</span></li>
                </ul>
            </div>
            <div class="jiem">
                <ul>
                    <li>意向加盟 <span class="price">{{$thisarticleinfos->article['brandattch']}}</span></li>
                    <li style=" margin-left:35px">申请加盟：<span class="price">{{$thisarticleinfos->article['brandapply']}}</span></li>
                    <li style=" margin-left:35px">品牌好评率 <span class="price">{{rand(90,99)}}%</span></li>
                </ul>
            </div>
            <div class="tel">联系电话：<span>400-8896-216</span></div>
            <div class="btn_area"> <a id="chatNowButton" href="#msg" class="zixun_btn">立即咨询</a> <a href="javascript:;" class="suoyao_btn ico-quoted">成本预算</a> </div>
        </div>
        <div class="layout2_right fl">
            <div class="comp_box">
                <div class="comp_info"> <b>公司信息</b>
                    <div class="comp_logo"> <img src="{{$thisarticleinfos['litpic']}}" alt="{{$thisarticleinfos->article['brandname']}}"/></div>
                    <div class="comp_info_con">
                        <h3 title="{{$thisarticleinfos->article['brandgroup']}}">{{$thisarticleinfos->article['brandgroup']}}</h3>
                        <ul>
                            <li><span>企业性质</span><em>国有企业</em></li>
                            <li><span>注册资金</span><em>100 万元</em></li>
                            <li><span>所在地</span><em>{{$thisarticleinfos->article['brandorigin']}}</em></li>
                            <li><span>商业特许经营许可证号：</span><em>{{$thisarticleinfos->article['licenseno']}}</em></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="comp_fenx">
                <div class="renZ_info">
                    <ul >
                        <li class="mr15"><span class="beian1"> </span><em>备案企业</em></li>
                        <li class="mr15"><span class="renzheng1"></span><em>企业认证</em></li>
                        <li><span class="baozhang1"></span><em>投资保障</em></li>
                    </ul>
                </div>
                <div class="fx">
                    <div class="fxd">分享到：</div>
                    <div class="bdsharebuttonbox" data-tag="share_1">
                        <a href="#" class="bds_qzone1" data-cmd="tsina" title="分享到QQ空间"></a>
                        <a href="#" class="bds_tsina1" data-cmd="qzone" title="分享到新浪微博"></a>
                        <a href="#" class="bds_weixin1" data-cmd="weixin" title="分享到微信"></a>
                    </div>
                    <script>
                        window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="center_list clearfix">
        <div class="news_box">
            <div class="w870">
                <div class="fixed_nav">
                    <div class="cont_tab">
                        <ul>
                            <li class="js_join_1 cur"><a href="javascript:void(0)">品牌介绍</a></li>
                            <li class="js_join_2"><a href="javascript:void(0)">加盟优势</a></li>
                            <li class="js_join_3"><a href="javascript:void(0)">加盟流程</a></li>
                            <li class="js_join_4"><a href="javascript:void(0)">开店要求</a></li>
                            <li class="js_join_5"><a href="javascript:void(0)">开店必看</a></li>
                            <li class="js_join_6"><a href="javascript:void(0)">投资分析</a></li>
                            <li class="js_join_7"><a href="javascript:void(0)">用户点评</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="news_center">

                <div class="join_cont">
                    <div class="join_tit" id="js_join_1" style="margin-bottom: 8px">@if(!empty($thisarticleinfos->ppjstitle))  <h2 class="tit">{{$thisarticleinfos->ppjstitle}}</h2> @else <h2 class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>品牌介绍</em></h2>  @endif</div>
                    <table cellspacing="0" style="border-top: 1px solid rgb(230, 230, 230);">
                        <tbody>
                        <tr>
                            <td class="td_color" >品牌名称</td>
                            <td class="td_style">{{$thisarticleinfos->article['brandname']}}</td>
                            <td class="td_color">投资金额</td>
                            <td class="td_style">{{$thisarticleinfos->article['brandpay']}}</td>
                        </tr>
                        <tr>
                            <td class="td_color" >成立日期</td>
                            <td class="td_style">{{$thisarticleinfos->article['brandtime']}}</td>
                            <td class="td_color">门店总数</td>
                            <td class="td_style">{{$thisarticleinfos->article['brandnum']}}</td>
                        </tr>
                        <tr>
                            <td class="td_color">经营范围</td>
                            <td class="td_style">{{$thisarticleinfos->article['brandmap']}}</td>
                            <td class="td_color">适合人群</td>
                            <td class="td_style">{{$thisarticleinfos->article['brandperson']}}</td>
                        </tr>
                        <tr>
                            <td class="td_color">加盟区域</td>
                            <td class="td_style">{{$thisarticleinfos->article['brandarea']}}</td>
                            <td class="td_color">是否有区域授权</td>
                            <td class="td_style">{{$thisarticleinfos->article['brandduty']}}</td>
                        </tr>
                        <tr>
                            <td class="td_color">品牌发源地</td>
                            <td class="td_style">{{$thisarticleinfos->article['brandorigin']}}</td>
                            <td class="td_color">合同期限</td>
                            <td class="td_style"></td>
                        </tr>
                        <tr>
                            <td class="td_color">培训期限</td>
                            <td class="td_style">二周</td>
                            <td class="td_color">特许使用费</td>
                            <td class="td_style"></td>
                        </tr>
                        <tr>
                            <td class="td_color">公司名称</td>
                            <td class="td_style">{{$thisarticleinfos->article['brandgroup']}}</td>
                            <td class="td_color">公司性质</td>
                            <td class="td_style">{{$thisarticleinfos->article['genre']}}</td>
                        </tr>
                        <tr>
                            <td class="td_color">所需面积</td>
                            <td class="td_style">{{$thisarticleinfos->article['acreage']}}</td>
                            <td class="td_color"> </td>
                            <td class="td_style"> </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="join_intro">
                        {!! $thisarticleinfos->article['body'] !!}
                    </div>

                    <div class="join_tit" id="js_join_">@if(!empty($thisarticleinfos->jmxqtitle))  <h2 class="tit">{{$thisarticleinfos->jmxqtitle}}</h2> @else <h2 class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>加盟详情</em></h2>  @endif</div>
                    <div class="join_intro">
                        {!! $thisarticleinfos->article['jmxq_content'] !!}
                    </div>
                    <div class="join_tit" id="js_join_2">@if(!empty($thisarticleinfos->jmystitle))  <h2 class="tit">{{$thisarticleinfos->jmystitle}}</h2> @else <h2 class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>加盟优势</em></h2>  @endif </div>
                    <div class="join_intro">
                        {!! $thisarticleinfos->article['jmys_content'] !!}
                    </div>
                    <div class="join_tit" id="js_join_3">@if(!empty($thisarticleinfos->jmlctitle))  <h2 class="tit">{{$thisarticleinfos->jmlctitle}}</h2> @else <h2 class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>加盟流程</em></h2>  @endif </div>
                    <div class="join_intro">
                        {!! $thisarticleinfos->article['jmlc_content'] !!}
                    </div>
                    <div class="join_tit" id="js_join_4">@if(!empty($thisarticleinfos->jmzctitle))  <h2 class="tit">{{$thisarticleinfos->jmzctitle}}</h2> @else <h2 class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>加盟政策</em></h2>   @endif </div>
                    <div class="join_intro">
                        {!! $thisarticleinfos->article['jmzc_content'] !!}
                    </div>
                    <div class="join_tit" id="js_join_5">@if(!empty($thisarticleinfos->jmasktitle))  <h2 class="tit" >{{$thisarticleinfos->jmasktitle}}</h2> @else <h2 class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>加盟问答</em></h2>  @endif </div>
                    <div class="join_intro">
                        {!! $thisarticleinfos->article['jmask_content'] !!}
                    </div>
                    <div class="join_tit" > <h2 class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>品牌展示</em></h2> </div>
                    <div class=" join_img">
                        <ul>
                            @foreach( array_filter(explode(',',$thisarticleinfos->article['imagepics'])) as $pics)
                                <li><img src="{{$pics}}" alt="【{{$thisarticleinfos->article['brandname']}}】"/></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="join_tit"  id="js_join_6" > <h2 class="tit">【{{$thisarticleinfos->article['brandname']}}】<em>投资分析</em></h2> </div>
                    <table cellspacing="0" style="border-top: 1px solid rgb(230, 230, 230);">
                        <tbody>
                        <tr>
                            <td class="td_color" >品牌名称</td>
                            <td class="td_style">{{$thisarticleinfos->article['brandname']}}</td>
                            <td class="td_color">装修费用</td>
                            <td class="td_style">{{$thisarticleinfos->article['decorationpay']}}</td>
                        </tr>
                        <tr>
                            <td class="td_color" >前两季度房租</td>
                            <td class="td_style">{{$thisarticleinfos->article['quartersrent']}}</td>
                            <td class="td_color">货铺/设备费用</td>
                            <td class="td_style">{{$thisarticleinfos->article['equipmentcost']}}</td>
                        </tr>
                        <tr>
                            <td class="td_color">流动资金</td>
                            <td class="td_style">{{$thisarticleinfos->article['workingcapital']}}</td>
                            <td class="td_color">人工开支</td>
                            <td class="td_style">{{$thisarticleinfos->article['laborquarter']}}</td>
                        </tr>
                        <tr>
                            <td class="td_color">工商税务杂项</td>
                            <td class="td_style">{{$thisarticleinfos->article['miscellaneous']}}</td>
                            <td class="td_color">水电煤(元/月)</td>
                            <td class="td_style">{{$thisarticleinfos->article['watercoal']}}</td>

                        </tr>
                        <tr>
                            <td class="td_color">日成交量</td>
                            <td class="td_style">{{$thisarticleinfos->article['dailyvolume']}}</td>
                            <td class="td_color">平均单价</td>
                            <td class="td_style">{{$thisarticleinfos->article['unitprice']}}</td>

                        </tr>
                        <tr>
                            <td class="td_color">日均成本</td>
                            <td class="td_style">{{ceil(($thisarticleinfos->article['decorationpay']/365)+($thisarticleinfos->article['quartersrent']/180)+($thisarticleinfos->article['equipmentcost']/365)+($thisarticleinfos->article['laborquarter']/365)+($thisarticleinfos->article['miscellaneous']/365)+($thisarticleinfos->article['watercoal']/30))}}</td>
                            <td class="td_color">日均收入</td>
                            <td class="td_style">{{ceil(($thisarticleinfos->article['dailyvolume']*$thisarticleinfos->article['dailyvolume'])-(($thisarticleinfos->article['decorationpay']/365)+($thisarticleinfos->article['quartersrent']/180)+($thisarticleinfos->article['equipmentcost']/365)+($thisarticleinfos->article['laborquarter']/365)+($thisarticleinfos->article['miscellaneous']/365)+($thisarticleinfos->article['watercoal']/30)))}}</td>
                        </tr>
                        <tr>
                            <td class="td_color">月收入</td>
                            <td class="td_style">{{ceil(($thisarticleinfos->article['dailyvolume']*$thisarticleinfos->article['dailyvolume'])-(($thisarticleinfos->article['decorationpay']/365)+($thisarticleinfos->article['quartersrent']/180)+($thisarticleinfos->article['equipmentcost']/365)+($thisarticleinfos->article['laborquarter']/365)+($thisarticleinfos->article['miscellaneous']/365)+($thisarticleinfos->article['watercoal']/30)))*30/10000}}万</td>
                            <td class="td_color">公司性质</td>
                            <td class="td_style">{{$thisarticleinfos->article['genre']}}</td>
                        </tr>
                        <tr>
                            <td class="td_color">年收入</td>
                            <td class="td_style">{{ceil(($thisarticleinfos->article['dailyvolume']*$thisarticleinfos->article['dailyvolume'])-(($thisarticleinfos->article['decorationpay']/365)+($thisarticleinfos->article['quartersrent']/180)+($thisarticleinfos->article['equipmentcost']/365)+($thisarticleinfos->article['laborquarter']/365)+($thisarticleinfos->article['miscellaneous']/365)+($thisarticleinfos->article['watercoal']/30)))*365/10000}}万</td>
                            <td class="td_color"> 投资总额</td>
                            <td class="td_style">{{ceil(($thisarticleinfos->article['decorationpay']+($thisarticleinfos->article['quartersrent']*2)+$thisarticleinfos->article['equipmentcost']+$thisarticleinfos->article['workingcapital']+$thisarticleinfos->article['laborquarter']+$thisarticleinfos->article['miscellaneous']+($thisarticleinfos->article['watercoal']*12))/10000)}} 万</td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="join_intro clear">
                        <div class="col-md-6">

                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">{{$thisarticleinfos->article['brandname']}} 投资比例</h3>
                                </div>
                                <div class="box-body">
                                    <canvas id="pieChart" style="height:250px"></canvas>
                                </div>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">{{$thisarticleinfos->article['brandname']}}投资对比柱状图</h3>
                                </div>
                                <div class="box-body">
                                    <div class="chart">
                                        <canvas id="barChart" style="height:230px"></canvas>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="clear"></div>

                    <div class="cy_img"><img src="/reception/images/cye_03.jpg" alt="加盟步骤"/> </div>

                @include('frontend.comment')

                    <div class="xg_news">
                        <div class="title"><strong>{{$thisarticleinfos->article['brandname']}}资讯</strong></div>
                        <div class="xw">
                            <ul class="clearfix">
                                @foreach($xgsearchs as $xgsearch)
                                <li><em>{{$xgsearch->published_at}}</em><a href="/{{$xgsearch->arctype->real_path}}/{{$xgsearch->id}}.shtml" title="{{$xgsearch->title}}">{{$xgsearch->title}} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="gbook" id="msg">
                        <div class="hd">
                            <span class="tit">我要咨询</span>
                            <em>(24小时内获得企业的快速回复)</em>
                            <span class="tips">(<i>*</i>为必填选项)</span>
                        </div>

                        <div class="bd">
                            <ul>
                                <li><span class="txt"><i>*</i>姓名</span><input type="text" name="guestname" id="guestname" value="" class="input_bk" placeholder="您的真实姓名">
                                    <span class="sex"><label><input type="radio" value="男" name="Sex" class="ly_radio"><em>先生</em></label><label><input type="radio" name="Sex" value="女" class="ly_radio"><em>女士</em></label></span></li>
                                <li><span class="txt"><i>*</i>手机</span><input type="text" class="input_bk" id="phonenum" name="iphone" placeholder="电话是与您联系的重要方式"></li>
                                <li><span class="txt">地址</span><input type="text" class="input_bk" name="adr" id="addresss" placeholder="与您联系的重要方式"></li>
                                <li>
                                    <span class="txt"><i>*</i>留言</span><textarea id="note" name="content" class="textarea_bk" placeholder="请输入您的留言内容或选择快捷留言"></textarea>
                                    <div class="check_msg">
                                        <div class="check_msg_tit">请填写留言或根据意向选择下列快捷留言</div>
                                        <div class="check_msg_bd">
                                            <ul>
                                                <li><a href="javascript:;" class="no" target="_self">我加盟后，您们还会提供哪些服务？</a></li>
                                                <li><a href="javascript:;" class="no" target="_self">有兴趣开一个店，请寄资料或给我打电话。</a></li>
                                                <li><a href="javascript:;" class="no" target="_self">请问我这个地方有加盟商了吗？</a></li>
                                                <li><a href="javascript:;" class="no" target="_self">请将详细投资方案和资料寄给本人。</a></li>
                                                <li><a href="javascript:;" class="no" target="_self">初步打算加盟贵公司，请寄资料。</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="txt">&nbsp;</span><input type="submit" value="提交留言" id="tj_btn" class="btn">
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="new_right">
            <!--计算器 开始-->
            <div class="w260_calculator">
                <div class="hd"><em>260000</em>元</div>
                <div class="bd">
                    <form onSubmit="return false;">
                        <ul>
                            <li>
                                <select id="r_Shen" name="r_Shen" class="select_Shen" onchange="set_city(this, document.getElementById('r_city'));">
                                    <option value="0">省/市</option>
                                    <option value="安徽">A 安徽</option>
                                    <option value="北京">B 北京</option>
                                    <option value="重庆">C 重庆</option>
                                    <option value="福建">F 福建</option>
                                    <option value="广西">G 广西</option>
                                    <option value="贵州">G 贵州</option>
                                    <option value="广东">G 广东</option>
                                    <option value="甘肃">G 甘肃</option>
                                    <option value="海南">H 海南</option>
                                    <option value="湖北">H 湖北</option>
                                    <option value="黑龙江">H 黑龙江</option>
                                    <option value="河南">H 河南</option>
                                    <option value="河北">H 河北</option>
                                    <option value="湖南">H 湖南</option>
                                    <option value="江苏">J 江苏</option>
                                    <option value="吉林">J 吉林</option>
                                    <option value="江西">J 江西</option>
                                    <option value="辽宁">L 辽宁</option>
                                    <option value="内蒙古">N 内蒙古</option>
                                    <option value="宁夏">N 宁夏</option>
                                    <option value="澳门">O 澳门</option>
                                    <option value="青海">Q 青海</option>
                                    <option value="四川">S 四川</option>
                                    <option value="陕西">S 陕西</option>
                                    <option value="上海">S 上海</option>
                                    <option value="山东">S 山东</option>
                                    <option value="山西">S 山西</option>
                                    <option value="台湾">T 台湾</option>
                                    <option value="天津">T 天津</option>
                                    <option value="西藏">X 西藏</option>
                                    <option value="香港">X 香港</option>
                                    <option value="新疆">X 新疆</option>
                                    <option value="云南">Y 云南</option>
                                    <option value="浙江">Z 浙江</option>
                                </select>
                                <select id="r_city" name="r_city" class="select_Citys">
                                    <option value="0">市/地区</option>
                                </select>
                            </li>
                            <li><input type="text" class="text area_text" name="dpzj" id="dpzj_left" placeholder="店铺租金"><em>元</em></li>
                            <li><input type="text" class="text area_text" name="rycb" id="rycb_left" placeholder="人员成本"><em>元</em></li>
                            <li><input type="text" class="text area_text" name="mrcb" id="mrcb_left" placeholder="日成交量"><em>元</em></li>
                            <li><input type="text" class="text area_text" name="mdjj" id="mdjj_left" placeholder="每单均价"><em>元</em></li>
                            <li><input type="text" class="text area_text" name="jmfy" id="jmfy_left" placeholder="加盟费用"><em>元</em></li>
                            <li><input type="text" class="text area_text" name="phone" id="zxys_phonenumber_left" placeholder="输入手机号，获取报价结果"></li>
                            <li><input type="button" class="btn" id="btn_hqbj" name="btn_hqbj" value="获取报价"></li>
                        </ul>
                    </form>
                </div>
                <!--计算结果 开始-->
                <div class="w260_result" id="results">
                    <div class="w260_result_total"><span class="w260_result_span">您的开店预算</span><b id="bprice">？</b><span>元</span></div>
                </div>
                <!--计算结果 结束-->

            </div>
            <script src="/reception/js/GlobalProvinces.js" type="text/javascript"></script>
            <div class="new_bt">
                <h3> <i></i> 零食店加盟排行榜 </h3>
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
                <h3> <i></i> 最新休闲食品加盟项目 </h3>
                <div class="bt_xiangmu">
                    <ul>
                        @foreach($latestbrands as $latestbrand)
                        <li> <a href="/{{$latestbrand->arctype->real_path}}/{{$latestbrand->id}}.shtml">{{$latestbrand->article['brandname']}}</a> </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="new_bt">
                <h3> <i></i> 大家还在搜 </h3>
                <div class="kuishurk">
                    @foreach(explode(',',$thisarticleinfos->article['bdxg_search']) as $bdxg_search)
                        <span>{{$bdxg_search}}</span>
                    @endforeach

                </div>
            </div>

            <div class="new_bt">
                <h3> <i></i> 最新零食新闻 </h3>
                <div class="bts com_news">
                    <div class="common">
                        <ul>
                            @foreach($latesnews as $latesnew)
                            <li><a href="/{{$latesnew->arctype->real_path}}/{{$latesnew->id}}.shtml" target="_blank" title="{{$latesnew->title}}">{{$latesnew->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="/AdminLTE/plugins/chartjs/Chart.min.js"></script>
<script>
    $(function () {
        var areaChartData = {
            labels: ["三只松鼠", "良品铺子", "一扫光", "老婆大人", "怡佳人", "零食多", "舌间味"],
            datasets: [
                {
                    label: "其他热门品牌",
                    fillColor: "rgba(210, 214, 222, 1)",
                    strokeColor: "rgba(210, 214, 222, 1)",
                    pointColor: "rgba(210, 214, 222, 1)",
                    pointStrokeColor: "#c1c7d1",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [90000, 80000, 70000, 60000, 50000, 40000, 70500]
                },
                {
                    label: "{{$thisarticleinfos->article['brandname']}}",
                    fillColor: "rgba(60,141,188,0.9)",
                    strokeColor: "rgba(60,141,188,0.8)",
                    pointColor: "#3b8bba",
                    pointStrokeColor: "rgba(60,141,188,1)",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(60,141,188,1)",
                    data: [28000, 20000, 28000, 28000, 28000, 28000, 28000]
                }
            ]
        };

        var areaChartOptions = {
            showScale: true,
            scaleShowGridLines: false,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve: true,
            bezierCurveTension: 0.3,
            pointDot: false,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
             pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
            maintainAspectRatio: true,
            responsive: true
    };
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: {{$thisarticleinfos->article['decorationpay']}},
        color: "#f56954",
        highlight: "#f56954",
        label: "店铺装修费用"
      },
      {
        value: {{$thisarticleinfos->article['quartersrent']}},
        color: "#00a65a",
        highlight: "#00a65a",
        label: "前两季度房租"
      },
      {
        value: {{$thisarticleinfos->article['equipmentcost']}},
        color: "#f39c12",
        highlight: "#f39c12",
        label: "铺货/设备费用"
      },
      {
        value: {{$thisarticleinfos->article['workingcapital']}},
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "流动资金"
      },
      {
        value: {{$thisarticleinfos->article['laborquarter']}},
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "一季度人工开支"
      },
       {
        value: {{$thisarticleinfos->article['watercoal']}},
        color: "#ec8dbc",
        highlight: "#3c8dbc",
        label: "水电煤(元/月)"
      },
      {
        value: {{$thisarticleinfos->article['miscellaneous']}} ,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "工商税务等杂项"
      }
    ];
    var pieOptions = {
      segmentShowStroke: true,
      segmentStrokeColor: "#fff",
      segmentStrokeWidth: 2,
      percentageInnerCutout: 50,
      animationSteps: 100,
      animationEasing: "easeOutBounce",
      animateRotate: true,
      animateScale: false,
      responsive: true,
        maintainAspectRatio: true,
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    pieChart.Doughnut(PieData, pieOptions);
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
     scaleBeginAtZero: true,
      scaleShowGridLines: true,
      scaleGridLineColor: "rgba(0,0,0,.05)",
      scaleGridLineWidth: 1,
      scaleShowHorizontalLines: true,
      scaleShowVerticalLines: true,
      barShowStroke: true,
      barStrokeWidth: 2,
      barValueSpacing: 5,
      barDatasetSpacing: 1,
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
@stop
