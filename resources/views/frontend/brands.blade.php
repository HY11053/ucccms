@extends('frontend.frontend')
@section('title') {{$thistypeinfo->title}}@stop
@section('keywords') {{$thistypeinfo->keywords}} @stop
@section('description')  {{$thistypeinfo->description}}  @stop
@section('headlibs')
    <meta name="Copyright" content="58零食网-{{env('APP_URL')}}"/>
    <meta name="author" content="58零食网" />
    <meta http-equiv="mobile-agent" content="format=wml; url={{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=html5; url={{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" />
    <link rel="alternate" media="only screen and(max-width: 640px)" href="{{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" >
    <link rel="canonical" href="{{env('APP_URL')}}{{Request::getrequesturi()}}"/>
@stop
@section('main_content')
   @include('frontend.position')
<div class="main clearfix">

    <div class="cate_sort">
        <dl>
            <dt>已经筛选条件：</dt>
            <dd></dd>
        </dl>
        <dl>
            <dt>项目分类</dt>
            <dd><a class="hover" target="_self" href="#">全部</a></dd>
            @foreach($brandtypes as $brandtype)
            <dd><a target="_self" href="/{{$brandtype->real_path}}/">{{$brandtype->typename}}</a></dd>
            @endforeach

        </dl>
        <dl>
            <dt>投资金额</dt>
            <dd><a class="hover" target="_self" href="#">全部</a></dd>
            <dd><a target="_self" href="/project/0-1~5-0-0.shtml">1-5万元</a></dd>
            <dd><a target="_self" href="/project/0-5~10-0-0.shtml">5-10万元</a></dd>
            <dd><a target="_self" href="/project/0-10~20-0-0.shtml">10-20万元</a></dd>
            <dd><a target="_self" href="/project/0-20~30-0-0.shtml">20-30万元</a></dd>
            <dd><a target="_self" href="/project/0-30~50-0-0.shtml">30-50万元</a></dd>
            <dd><a target="_self" href="/project/0-50~100-0-0.shtml">50-100万元</a></dd>
        </dl>
        <dl>
            <dt>店铺面积</dt>
            <dd><a class="hover" target="_self" href="#">全部</a></dd>
            <dd><a target="_self" href="/project/0-0-1~10-0.shtml">10平米以下</a></dd>
            <dd><a target="_self" href="/project/0-0-10~30-0.shtml">10-30平米</a></dd>
            <dd><a target="_self" href="/project/0-0-30~50-0.shtml">30-50平米</a></dd>
            <dd><a target="_self" href="/project/0-0-50~80-0.shtml">50-80平米</a></dd>
            <dd><a target="_self" href="/project/0-0-100-0.shtml">100平米以上</a></dd>
        </dl>
        <dl>
            <dt>所在地区</dt>
            <dd><a class="hover" target="_self" href="#">全部</a></dd>
            <dd><a target="_self" href="/project/0-0-0-1.shtml">北京</a></dd>
            <dd><a target="_self" href="/project/0-0-0-125.shtml">济南</a></dd>
            <dd><a target="_self" href="/project/0-0-0-71.shtml">广州</a></dd>
            <dd><a target="_self" href="/project/0-0-0-281.shtml">合肥</a></dd>
            <dd><a target="_self" href="/project/0-0-0-401.shtml">上海</a></dd>
            <dd><a target="_self" href="/project/0-0-0-282.shtml">芜湖</a></dd>
            <dd><a target="_self" href="/project/0-0-0-195.shtml">武汉</a></dd>
            <dd><a target="_self" href="/project/0-0-0-112.shtml">南京</a></dd>
            <dd><a target="_self" href="/project/0-0-0-296.shtml">长沙</a></dd>
            <dd><a target="_self" href="/project/0-0-0-126.shtml">青岛</a></dd>
            <dd><a target="_self" href="/project/0-0-0-72.shtml">深圳</a></dd>
            <dd><a target="_self" href="/project/0-0-0-164.shtml">成都</a></dd>
            <dd><a target="_self" href="/project/0-0-0-139.shtml">沈阳</a></dd>
            <dd><a target="_self" href="/project/0-0-0-29.shtml">重庆</a></dd>
            <dd><a target="_self" href="/project/0-0-0-212.shtml">郑州</a></dd>
            <dd><a target="_self" href="/project/0-0-0-101.shtml">杭州</a></dd>
            <dd><a target="_self" href="/project/0-0-0-83.shtml">佛山</a></dd>
        </dl>
    </div>
    <div class="rec_brand_list">
        <ul>
            @foreach($topbrands as $topbrand)
            <li><a href="/{{ $topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml" target="_blank" title="{{$topbrand->shorttitle}}" class="pic"><img src="{{$topbrand->litpic}}" alt="{{$topbrand->shorttitle}}"><em>{{$topbrand->shorttitle}}</em></a></li>
            @endforeach
        </ul>
    </div>

    <div class="w910">
        <div class="order_item">
            <div class="order_item_l">
                <a class="cur" href="#">默认排序</a>
                <a href="#">金额排序<i class="up"></i><!--<i class="down"></i>--></a>
            </div>
            <div class="order_item_r">共找到<span>{{$pagelists->total()}}</span>个零食品牌加盟项目</div>
        </div>

        <div class="brand_list" id="productBox">
            @foreach($pagelists as $pagelist)
            <div class="brand_list_item">
                <div class="pro-Img fl">
                    <a target="_blank" href="/{{$pagelist->arctype->real_path}}/{{$pagelist->id}}.shtml" class="pp-pic-name" title="{{$pagelist->article->brandname}}"><img src="{{$pagelist->litpic}}" alt="{{$pagelist->article->brandname}}"></a>
                    <p class="pro_p">{!! strip_tags($pagelist->description) !!}</p>
                </div>
                <div class="indrouce-r fl">
                    <div class="list list-one">
                        <a target="_blank" href="/{{$pagelist->arctype->real_path}}/{{$pagelist->id}}.shtml" title="{{$pagelist->article->brandname}}"><h3 class="list-Name fl">{{$pagelist->article->brandname}}</h3></a>
                        <span class="money fr h4">投资额度：&nbsp;<em class="red">{{$pagelist->article->brandpay}}</em>&nbsp;&nbsp;&nbsp;所在地区：&nbsp;<em class="red">{{$pagelist->article->brandorigin}}</em>&nbsp;&nbsp;</span>
                    </div>
                    <div class="list list-two">
                        <div class="biao_h clearfix fl"> <i class="jianIco fl"></i> <i class="shenIco fl"></i> <i class="huiIco fl"></i> <i class="baoIco fl"></i> </div>
                        <div class="jibie fl"><span>投资星级：<em class="xing">★★★★★</em></span></div>
                        <span class="money fr h4">综合指数：&nbsp;<em class="red">{{$pagelist->article->brandattch}}</em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;最近咨询：&nbsp;<em class="red">{{$pagelist->article->brandchat}}</em>&nbsp;&nbsp;</span>
                    </div>
                    <div class="list-three">
                        <a href="#" target="_blank" class="squaer tell fl">免费通话</a>
                        <a href="#" target="_blank" class="squaer liuyan fl">马上留言</a>
                        <a href="/{{$pagelist->arctype->real_path}}/{{$pagelist->id}}.shtml" target="_blank" class="squaer xiangqing fl">项目详情</a>
                        <span class="byb_btn"><label><input type="checkbox" id="Db_64806" cid="64806" class="checkbox" data-pro='{"pid":{{$pagelist->id}},"name":"{{$pagelist->shorttitle}}","pic":"{{$pagelist->litpic}}","url":"{{env('app_url')}}/{{$pagelist->arctype->real_path}}/{{$pagelist->id}}.shtml"}'>
						项目比一比</label></span>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="page">
            {!! preg_replace('/<a href=[\'\"]?([^\'\" ]+).*?>/','<a href="${1}/">',$pagelists->links()) !!}
        </div>
    </div>

    <div class="w260">
		<div class="w260_calculator">
			<div class="hd"><em>260000</em>元</div>
			<div class="bd">
				<form onSubmit="return false;">
				<ul>
					<li>
						<select id="r_Shen" name="r_Shen" class="select_Shen" onChange="set_city(this, document.getElementById('r_city'));">
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
        <div class="new_comments">
            <div class="common_bt">
                <div class="tit">实时评价</div>
            </div>
            <div class="bd">
                <ul>
                    @foreach($comments as $comment)
                    <li>
                        <p><em>{{$comment->user->name}}</em><b>咨询</b><a target="_blank" href="/{{$comment->archive->arctype->real_path}}/{{$comment->archive->id}}.shtml"><em>{{$comment->archive->shorttitle}}</em></a></p>
                        <p class="txt-col">{{str_limit($comment->content,30,'...')}}</p>
                    </li>
                   @endforeach
                </ul>
            </div>
        </div>

        <div class="bn260"><a href="/lingshidianpp/91.shtml" target="_blank"><img src="/reception/images/temp/bn6.jpg" width="260" height="295" alt=""/></a></div>

        <div class="side_news">
            <div class="common_bt">
                <div class="tit">推荐文章</div>
            </div>
            <div class="common_list">
                <ul>
                    @foreach($newsbrands as $newsbrand)
                    <li><a href="/{{$newsbrand->arctype->real_path}}/{{$newsbrand->id}}.shtml" target="_blank" title="{{$newsbrand->title}}">{{$newsbrand->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>


</div>
<div class="byb" id="bybLayer" style="display: none">
    <form action="/comparision/" method="post" target="_blank">
        <h2><em></em><span id="bybNumber">[<span id="Db_number">1</span>/3]</span>对比框</h2>
        <div class="byb-list" id="selectedplan"> </div>
        <div class="byb-ft"> <a href="javascript:void(0)" class="byb-submit" id="byb-submit">对比</a>
            <p><a style="cursor:pointer;" id="bybReset">清空对比栏</a></p>
        </div>
    </form>
</div>

<div class="tm_back"></div>
<div class="tk_sty2"  id="limit-tips_un">
    <h2><span>友情提示</span><i class="close"></i></h2>
    <p id="error"></p>
    <div class="tk_an"><em><a href="javascript:void(0);" class="close" >确定</a></em></div>
</div>
<script src="/reception/js/jquery.cookie.js"></script>
<script src="/reception/js/jquery.dialog.js"></script>
<script type="text/javascript" src="/reception/js/comparse.js"></script>
@stop
