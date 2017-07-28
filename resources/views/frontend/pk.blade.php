@extends('frontend.frontend')
@section('title') @if(isset($cbrand1)) {{$cbrand1->shorttitle}}和 @endif @if(isset($cbrand2)) {{$cbrand2->shorttitle}}和 @endif @if(isset($cbrand3)) {{$cbrand3->shorttitle}}和 @endif 哪家好@stop
@section('keywords') 关键字 @stop
@section('description') 描述 @stop
@section('main_content')
<div class="main clearfix">
    <div class="cmpare layout mt20 clearfix">
        <div class="compare1 fl">
            <div class="pk fl">
                <div class="pk-tit"></div>
                <p class="cmp-t">对比项目</p>
            </div>
            <div class="mianshi fl">
                <div class="mianshi-con1">
                    <div class="mianshiImg">
                        <img src="@if(isset($cbrand1)) {{$cbrand1->litpic}} @endif">
                    </div>
                </div>
            </div>
            <div class="mianshi fl">
                <div class="mianshi-con1">
                    <div class="mianshiImg">
                        <img src="@if(isset($cbrand2)) {{$cbrand2->litpic}} @endif">
                        <i id="@if(isset($cbrand2)) {{$cbrand2->id}} @endif" class="closeBg"></i>
                    </div>
                </div>
            </div>
            <div class="mianshi fl">
                <div class="mianshi-con1">
                    <div class="mianshiImg">
                        <img src="@if(isset($cbrand3)) {{$cbrand3->litpic}} @endif">
                        <i id="@if(isset($cbrand3)){{$cbrand3->id}} @endif " class="closeBg"></i>
                    </div>
                </div>
            </div>

        </div>
        <div class="ziliao fl">
            <div class="zlTab">
                <table>
                    <tbody><tr>
                        <td class="Ltable1">品牌名称：</td>
                        <td class="Ltable2">@if(isset($cbrand1))<a href="/{{$cbrand1->arctype->real_path}}/{{$cbrand1->id}}.shtml" target="_blank" title="{{$cbrand1->shorttitle}}">{{$cbrand1->shorttitle}}</a> @endif </td>
                        <td class="Ltable3">@if(isset($cbrand2))<a href="/{{$cbrand2->arctype->real_path}}/{{$cbrand2->id}}.shtml" target="_blank" title="{{$cbrand2->shorttitle}}">{{$cbrand2->shorttitle}}</a> @endif </td>
                        <td class="Ltable4">@if(isset($cbrand3))<a href="/{{$cbrand2->arctype->real_path}}/{{$cbrand2->id}}.shtml" target="_blank" title="{{$cbrand3->shorttitle}}">{{$cbrand3->shorttitle}}</a> @endif </td>
                    </tr>
                    <tr>
                        <td class="Ltable1">所属行业：</td>
                        <td class="Ltable2">@if(isset($cbrand1)) {{str_replace('加盟','',$cbrand1->arctype->typename)}} @endif </td>
                        <td class="Ltable3">@if(isset($cbrand2)) {{str_replace('加盟','',$cbrand2->arctype->typename)}} @endif </td>
                        <td class="Ltable4">@if(isset($cbrand3)) {{str_replace('加盟','',$cbrand3->arctype->typename)}} @endif </td>
                    </tr>
                    <tr>
                        <td class="Ltable1">投资金额：</td>
                        <td class="Ltable2">@if(isset($cbrand1)) {{$cbrand1->article->brandpay}} @endif </td>
                        <td class="Ltable3">@if(isset($cbrand2)) {{$cbrand2->article->brandpay}} @endif </td>
                        <td class="Ltable4">@if(isset($cbrand3)) {{$cbrand3->article->brandpay}} @endif </td>
                    </tr>
                    <tr>
                        <td class="Ltable1">公司所在地：</td>
                        <td class="Ltable2">@if(isset($cbrand1)) {{$cbrand1->article->brandaddr}} @endif</td>
                        <td class="Ltable3">@if(isset($cbrand2)) {{$cbrand2->article->brandaddr}} @endif</td>
                        <td class="Ltable4">@if(isset($cbrand3)) {{$cbrand3->article->brandaddr}} @endif</td>
                    </tr>
                    <tr>
                        <td class="Ltable1">店铺面积：</td>
                        <td class="Ltable2">@if(isset($cbrand1)) 暂无 @endif</td>
                        <td class="Ltable3">@if(isset($cbrand2)) 暂无 @endif</td>
                        <td class="Ltable4">@if(isset($cbrand3)) 暂无 @endif</td>
                    </tr>
                    <tr>
                        <td class="Ltable1">主营产品：</td>
                        <td class="Ltable2">@if(isset($cbrand1)) {{$cbrand1->article->brandmap}} @endif</td>
                        <td class="Ltable3">@if(isset($cbrand2)) {{$cbrand2->article->brandmap}} @endif</td>
                        <td class="Ltable4">@if(isset($cbrand3)) {{$cbrand3->article->brandmap}} @endif</td>
                    </tr>
                    <tr>
                        <td class="Ltable1">加盟条件：</td>
                        <td class="Ltable2">@if(isset($cbrand1))   {!! $cbrand1->article->jmzc_content !!} @endif</td>
                        <td class="Ltable3">@if(isset($cbrand2))   {!! $cbrand2->article->jmzc_content !!} @endif</td>
                        <td class="Ltable4">@if(isset($cbrand3))   {!! $cbrand3->article->jmzc_content !!} @endif </td>
                    </tr>
                    <tr>
                        <td class="Ltable1">项目评分：</td>
                        <td class="Ltable2">
                            <div class="xingBg">
                                <i class="xingji"></i><i class="xingji"></i><i class="xingji"></i><i class="xingji"></i><i class="xingji"></i>                        </div>
                        </td>
                        <td class="Ltable3">
                            <div class="xingBg">
                                <i class="xingji"></i><i class="xingji"></i><i class="xingji"></i><i class="xingji"></i><i class="xingji"></i>                        </div>
                        </td>
                        <td class="Ltable4">
                            <div class="xingBg">
                                <i class="xingji"></i><i class="xingji"></i><i class="xingji"></i><i class="xingji"></i><i class="xingji"></i>                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="Ltable1">浏览用户：</td>
                        <td class="Ltable2">@if(isset($cbrand1)) {{$cbrand1->click}} @endif</td>
                        <td class="Ltable3"> @if(isset($cbrand2)) {{$cbrand2->click}} @endif</td>
                        <td class="Ltable4"> @if(isset($cbrand3)) {{$cbrand3->click}}  @endif </td>
                    </tr>
                    <tr>
                        <td class="Ltable1">最近咨询：</td>
                        <td class="Ltable2"> @if(isset($cbrand1)) {{$cbrand1->article->brandattch }} @endif</td>
                        <td class="Ltable3"> @if(isset($cbrand2)) {{$cbrand2->article->brandattch }} @endif</td>
                        <td class="Ltable4"> @if(isset($cbrand3)) {{$cbrand3->article->brandattch }} @endif</td>
                    </tr>

                    </tbody></table>
            </div>
        </div>
    </div>
</div>
@stop