@extends('frontend.frontend')
@section('title') {{$title}} @stop
@section('keywords')  {{$title}},{{$title}}加盟@stop
@section('description') 58零食网{{$title}}频道实时发布更新最新{{$title}}信息及{{$title}}品牌资讯。包含行业最全{{$title}}加盟项目及品牌。{{$title}}的各类费用投资和成本预算 @stop

<!--主体开始-->
@section('main_content')
    <div class="bn1190"><a href="#" target="_blank"><img src="/reception/images/temp/bn{{rand(7,9)}}.jpg" alt=""/></a></div>
    <div class="path">当前位置：<a href="/">首页</a> &gt; <a href="{{Request::getrequesturi()}}">{{$title}}</a></div>
<div class="main clearfix">

    <!--分类筛选 开始-->
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
    <!--分类筛选 结束-->

    <!--推荐品牌 开始-->
    <div class="rec_brand_list">
        <ul>
            @foreach($topbrands as $topbrand)
            <li><a href="/{{ $topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml" target="_blank" title="{{$topbrand->shorttitle}}" class="pic"><img src="{{$topbrand->litpic}}" alt="{{$topbrand->shorttitle}}"><em>{{$topbrand->shorttitle}}</em></a></li>
            @endforeach
        </ul>
    </div>
    <!--推荐品牌 结束-->

    <!--左边 开始-->
    <div class="w910">
        <div class="order_item">
            <div class="order_item_l">
                <a class="cur" href="#">默认排序</a>
                <a href="#">金额排序<i class="up"></i><!--<i class="down"></i>--></a>
            </div>
            <div class="order_item_r">共找到<span>{{$pagelists->total()}}</span>个零食品牌加盟项目</div>
        </div>

        <!--列表 开始-->
        <div class="brand_list" id="productBox">

            @foreach($pagelists as $pagelist)
            @if($pagelist->mid==1)
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
                        <span class="byb_btn"><label><input type="checkbox" id="Db_64806" cid="64806" class="checkbox" data-pro='{"pid":{{$pagelist->id}},"name":"{{$pagelist->article->brandname}}","pic":"{{$pagelist->litpic}}","url":"{{env('APP_URL')}}/{{$pagelist->arctype->real_path}}/{{$pagelist->id}}.shtml"}'>
						项目比一比</label></span>
                    </div>
                </div>
            </div>
                @endif
            @endforeach

        </div>
        <!--列表 结束-->

        <!--分页 开始-->
        <div class="page">
            {!! $pagelists->links() !!}
        </div>
        <!--分页 结束-->
    </div>
    <!--左边 结束-->

    <!--右边 开始-->
    <div class="w260">
        <!--选择项目 开始-->
        <div class="choose">
            <div class="chooseTop">
                <p class="help-ask">没找到合适我的项目<img class="askBg" src="/reception/images/ask.png"> </p>
                <p class="tianxie">填写您的需求，让我来帮您！</p>
                <p> <a href="#" class="helpMe">帮我选项目</a> </p>
            </div>
            <div class="chooseBottom">
                <ul>
                    <li class="xuqiu1"><a>填写我的项目需求</a></li>
                    <li class="xuqiu2"><a>快、精、准帮您选择好项目</a></li>
                    <li class="xuqiu3"><a>创业有问题？帮您全面解答</a></li>
                </ul>
            </div>
        </div>
        <!--选择项目 结束-->

        <!--实时评价 开始-->
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
        <!--实时评价 结束-->

        <div class="bn260"><a href="#" target="_blank"><img src="/reception/images/temp/bn6.jpg" width="260" height="295" alt=""/></a></div>

        <!--推荐文章 开始-->
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

        <!--推荐文章 结束-->
    </div>
    <!--右边 结束-->




</div>
<!--主体结束-->
<!--比一比 begin-->
<div class="byb" id="bybLayer" style="display: none">
    <form action="/comparision/" method="post" target="_blank">
        <h2><em></em><span id="bybNumber">[<span id="Db_number">1</span>/3]</span>对比框</h2>
        <div class="byb-list" id="selectedplan"> </div>
        <div class="byb-ft"> <a href="javascript:void(0)" class="byb-submit" id="byb-submit">对比</a>
            <!--<input type="button" class="byb-submit" value="对比">-->
            <p><a style="cursor:pointer;" id="bybReset">清空对比栏</a></p>
        </div>
    </form>
</div>

<div class="tm_back"></div>
<!--遮罩层-->
<div class="tk_sty2"  id="limit-tips_un"> <!--提示框-->
    <h2><span>友情提示</span><i class="close"></i></h2>
    <p id="error"></p>
    <div class="tk_an"><em><a href="javascript:void(0);" class="close" >确定</a></em></div>
</div>
<script src="/reception/js/jquery.cookie.js"></script>
<script src="/reception/js/jquery.dialog.js"></script>
<script type="text/javascript">
    $(function(){
        var Obj = $.cookie('prosion');
        var proLayer = $("#bybLayer");
        var selectedplan = $("#selectedplan");
        if(Obj && Obj !='null'){
            selectedplan.append(Obj);
            $("#Db_number").text($('#selectedplan a').length);
            proLayer.show();
            if($('#selectedplan a').length>0){
                for(var i=0;i<=$('#selectedplan a').length;i++){
                    var checks = "Db_"+$('#selectedplan a').eq(i).attr('pid');
                    if($("#"+checks)){
                        $("#"+checks).attr('checked',true);
                    }
                }
            }
        }else{
            proLayer.hide();
        }
    });
    // 选择项目
    $(function(){
        var proBox = $("#productBox");
        var proLayer = $("#bybLayer");
        var selectedplan = $("#selectedplan");
        var bybNumber = $("#bybNumber");
        var bybReset = $("#bybReset");
        var suBtn = $(".byb-submit");
        proBox.delegate(".checkbox","change", function(){
            var $this = $(this);
            var data = $.parseJSON($(this).attr("data-pro"));
            if($('#selectedplan a').length<3 && $("#productBox .checkbox:checked").length<=3){
//            console.log($('#selectedplan a[pid="'+data.pid+'"]').length);
                if( $('#selectedplan a[pid="'+data.pid+'"]').length != 0 ){
                    $('#selectedplan a[pid="'+data.pid+'"]').remove();
                }else{
                    selectedplan.append('<a href="' + data.url + '" pid="' + data.pid + '" target="_blank" id="closebg_'+data.pid+'"><img src="' + data.pic + '"><em>' + data.name + '</em><input name="dataId_' + data.pid + '" type="hidden" value="' + data.pid + '"></a>');
                    var Obj = selectedplan.html();
                    $.cookie('prosion',Obj,{path:'/',domain:'zf.qudao.com'});
                    $("#Db_number").text($('#selectedplan a').length);
                    proLayer.show();
                }
                if(!$('#selectedplan a').length){proLayer.hide();}
            }else{
                var  value = [];
                $('#selectedplan a').each(function(){
                    value.push($(this).attr('pid'));
                });
                if(value.indexOf($this.attr('cid'))>=0){
                    $('#selectedplan a[pid="'+$this.attr('cid')+'"]').remove();
                    var Obj = selectedplan.html();
                    $.cookie('prosion',Obj,{path:'/',domain:'zf.qudao.com'});

                }else if($("#productBox .checkbox:checked").length>3){
                    $("#error").text("项目对比最多可选三个!");
                    $("#limit-tips_un").dialog();
                }



//            alert("项目对比最多可选三个!");
                $this.attr("checked",false);
            }

        });
        bybReset.bind("click", function(){
            selectedplan.html('');
            $.cookie('prosion',null,{path:'/',domain:'www.58lingshi.com'});
            proLayer.hide();
            $("#productBox .checkbox").attr("checked",false);
        });

        $('#byb-submit').click(function(){
            var url = "/comparision/";

            if($("#selectedplan a").length>=1){
                url+= $("#selectedplan a").eq(0).attr('pid')+"-";
            }else{
                url+= "0-";
            }
            if($("#selectedplan a").length>=2){
                url+= $("#selectedplan a").eq(1).attr('pid')+"-";
            }else{
                url+= "0-";
            }
            if($("#selectedplan a").length==3){
                url+= $("#selectedplan a").eq(2).attr('pid')+".shtml";
            }else{
                url+= "0.shtml";
            }
            window.location.href=url;
        });

    });
</script>

@stop
