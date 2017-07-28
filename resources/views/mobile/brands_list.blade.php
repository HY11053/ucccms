@extends('mobile.mobile')
@section('title') {{$thistypeinfo->title}}@stop
@section('keywords') {{$thistypeinfo->keywords}} @stop
@section('description')  {{$thistypeinfo->description}}  @stop
@section('main_content')
    <div class="brand_list">
        <ul>
            @foreach($pagelists as $brand)
            <li>
                <div class="img_show"><a href="/{{$brand->arctype->real_path}}/{{$brand->id}}.shtml"><img src="{{$brand->litpic}}" alt="{{$brand->article->brandname}}"/></a></div>
                <div class="cont">
                    <p class="tit"><a href="/{{$brand->arctype->real_path}}/{{$brand->id}}.shtml">{{$brand->article->brandname}}</a></p>
                    <p class="price">基本投资：<em>{{$brand->article->brandpay}}</em></p>
                    <p class="info">所在地区：{{$brand->article->brandaddr}}</p>
					<p class="desc">木姥姥零食荟萃，成立于2013年，总部位于人间天堂杭州，隶属于杭州木佬佬投资管理有限公司。木佬佬原本是杭州方言，誉为人多、商品多、多多的意思。木姥姥零食荟萃，之所以取名为此，寓意着为消费者提供优质、多样、全面的美味零食，让消费者享受到零食带来的乐趣。木姥姥零食荟萃总部，是杭州地区最大的休闲食品总代理</p>
                    <p class="btn"><a href="#" class="btn_ask">加盟咨询</a><a href="#" class="btn_intro">品牌介绍</a></p>
                </div>
            </li>
           @endforeach
        </ul>

    </div>
	<div class="page">
        {!! preg_replace('/<a href=[\'\"]?([^\'\" ]+).*?>/','<a href="${1}/">',$pagelists->links()) !!}
	</div>
@stop