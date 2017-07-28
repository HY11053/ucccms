@extends('mobile.mobile')
@section('title') {{ config('app.webname', '零食加盟网') }} @stop
@section('keywords') {{ config('app.keywords', '零食加盟网') }} @stop
@section('description') {{ config('app.description', '零食加盟网') }} @stop
@section('main_content')
    <div class="index_nav">
        <ul>
            @foreach($headers as $index=>$header)

            <li><a href="/{{$header->real_path}}/" class="icon{{$index}}"><em></em>{{$header->typename}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="index_item">
        <div class="common_tit">
            <a class="tit" href="/{{\App\AdminModel\Arctype::where('id',1)->value('real_path')}}/">零食品牌</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($lingshibrands as $lingshibrand)
                <li>
                    <a href="/{{$lingshibrand->arctype->real_path}}/{{$lingshibrand->id}}.shtml">
                        <div class="img_show"><img src="{{$lingshibrand->litpic}}"/></div>
                        <div class="cont">
                            <p class="tit">{{$lingshibrand->shorttitle}}</p>
                            <p class="desc">{{str_limit($lingshibrand->description,26,'...')}}</p>
                            <p class="price">投资金额：<em>￥{{$lingshibrand->article->brandpay}}</em></p>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="list">
            <ul>
                @foreach($lingshibrandls as $index=>$lingshibrandl)
                <li>
                    <a href="/{{$lingshibrandl->arctype->real_path}}/{{$lingshibrandl->id}}.shtml">
                        <i>{{$index+1}}</i><span>{{$lingshibrandl->shorttitle}}</span><em>已有{{$lingshibrandl->article->brandapply}}人申请</em>
                    </a>
                </li>
              @endforeach
            </ul>
        </div>
    </div>
    <div class="index_item">
        <div class="common_tit">
            <a class="tit" href="/{{\App\AdminModel\Arctype::where('id',3)->value('real_path')}}/">炒货品牌</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($chaohuobrands as $chaohuobrand)
                    <li>
                        <a href="/{{$chaohuobrand->arctype->real_path}}/{{$chaohuobrand->id}}.shtml">
                            <div class="img_show"><img src="{{$chaohuobrand->litpic}}"/></div>
                            <div class="cont">
                                <p class="tit">{{$chaohuobrand->shorttitle}}</p>
                                <p class="desc">{{str_limit($chaohuobrand->description,26,'...')}}</p>
                                <p class="price">投资金额：<em>￥{{$chaohuobrand->article->brandpay}}</em></p>
                            </div>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="list">
            <ul>
                @foreach($chaohuobrandls as $index=>$chaohuobrandl)
                    <li>
                        <a href="/{{$chaohuobrandl->arctype->real_path}}/{{$chaohuobrandl->id}}.shtml">
                            <i>{{$index+1}}</i><span>{{$chaohuobrandl->shorttitle}}</span><em>已有{{$chaohuobrandl->article->brandapply}}人申请</em>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="index_item">
        <div class="common_tit">
            <a class="tit" href="/{{\App\AdminModel\Arctype::where('id',4)->value('real_path')}}/">干果品牌</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($ganguobrands as $ganguobrand)
                    <li>
                        <a href="/{{$ganguobrand->arctype->real_path}}/{{$ganguobrand->id}}.shtml">
                            <div class="img_show"><img src="{{$ganguobrand->litpic}}"/></div>
                            <div class="cont">
                                <p class="tit">{{$ganguobrand->shorttitle}}</p>
                                <p class="desc">{{str_limit($ganguobrand->description,26,'...')}}</p>
                                <p class="price">投资金额：<em>￥{{$ganguobrand->article->brandpay}}</em></p>
                            </div>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="list">
            <ul>
                @foreach($ganguobrandls as $index=>$ganguobrandl)
                    <li>
                        <a href="/{{$ganguobrandl->arctype->real_path}}/{{$ganguobrandl->id}}.shtml">
                            <i>{{$index+1}}</i><span>{{$ganguobrandl->shorttitle}}</span><em>已有{{$ganguobrandl->article->brandapply}}人申请</em>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
    <div class="index_item">
        <div class="common_tit">
            <a class="tit" href="/{{\App\AdminModel\Arctype::where('id',1)->value('real_path')}}/">进口零食品牌</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($jinkoubrands as $jinkoubrand)
                    <li>
                        <a href="/{{$jinkoubrand->arctype->real_path}}/{{$jinkoubrand->id}}.shtml">
                            <div class="img_show"><img src="{{$jinkoubrand->litpic}}"/></div>
                            <div class="cont">
                                <p class="tit">{{$jinkoubrand->shorttitle}}</p>
                                <p class="desc">{{str_limit($jinkoubrand->description,26,'...')}}</p>
                                <p class="price">投资金额：<em>￥{{$jinkoubrand->article->brandpay}}</em></p>
                            </div>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="list">
            <ul>
                @foreach($jinkoubrandls as $index=>$jinkoubrandl)
                    <li>
                        <a href="/{{$jinkoubrandl->arctype->real_path}}/{{$jinkoubrandl->id}}.shtml">
                            <i>{{$index+1}}</i><span>{{$jinkoubrandl->shorttitle}}</span><em>已有{{$jinkoubrandl->article->brandapply}}人申请</em>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
    <div class="index_item">
        <div class="common_tit">
            <span class="tit" >最新品牌</span>
        </div>
        <div class="bd">
            <ul>
                @foreach($newbrands as $newbrand)
                    <li>
                        <a href="/{{$newbrand->arctype->real_path}}/{{$newbrand->id}}.shtml">
                            <div class="img_show"><img src="{{$newbrand->litpic}}"/></div>
                            <div class="cont">
                                <p class="tit">{{$newbrand->shorttitle}}</p>
                                <p class="desc">{{str_limit($newbrand->description,26,'...')}}</p>
                                <p class="price">投资金额：<em>￥{{$newbrand->article->brandpay}}</em></p>
                            </div>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
        <div class="list">
            <ul>
                @foreach($newbrandls as $index=>$newbrandl)
                    <li>
                        <a href="/{{$newbrandl->arctype->real_path}}/{{$newbrandl->id}}.shtml">
                            <i>{{$index+1}}</i><span>{{$newbrandl->shorttitle}}</span><em>已有{{$newbrandl->article->brandapply}}人申请</em>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
    <div class="index_news">
        <div class="common_tit">
            <a class="more" href="/{{\App\AdminModel\Arctype::where('id',2)->value('real_path')}}/">更多&gt;&gt;</a>
            <a class="tit" href="/{{\App\AdminModel\Arctype::where('id',2)->value('real_path')}}/">加盟快讯</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($newsarticles as $newsarticle)
                <li><span class="date">{{$newsarticle->published_at}}</span><a class="txt" href="/{{$newsarticle->arctype->real_path}}/{{$newsarticle->id}}.shtml">{{$newsarticle->title}}</a></li>
            @endforeach
            </ul>
        </div>
    </div>
    <div class="index_news">
        <div class="common_tit">
            <a class="more" href="/ask/">更多&gt;&gt;</a>
            <a class="tit" href="/ask/">创业指南</a>
        </div>
        <div class="bd">
            <ul>
                @foreach($asks as $ask)
                <li><span class="date">{{$ask->created_at}}</span><a class="txt" href="/ask/{{$ask->id}}.shtml">{{$ask->title}}</a></li>
               @endforeach
            </ul>
        </div>
    </div>
@stop