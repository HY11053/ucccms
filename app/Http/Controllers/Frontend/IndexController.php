<?php

namespace App\Http\Controllers\Frontend;

use App\AdminModel\Archive;
use App\AdminModel\Ask;
use App\AdminModel\flink;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    function Index()
    {
        //零食头部推荐品牌文档
        $lingshibrands=Archive::where('mid','1')->whereIn('id',[5,38,91, 51,35,115,53,85,72,80])->where('published_at','<=',Carbon::now())->take(10)->orderBy('id','asc')->get();
        $chaohuobrands=Archive::where('mid','1')->whereIn('id',[8,9,17, 18,28,29,34,49,55,126])->where('published_at','<=',Carbon::now())->take(10)->orderBy('id','asc')->get();
        $ganguobrands=Archive::where('flags','like','%'.'c'.'%')->where('mid','1')->where('typeid',4)->where('published_at','<=',Carbon::now())->take(10)->latest()->get();
        $jinkoubrands=Archive::where('flags','like','%'.'c'.'%')->where('mid','1')->where('typeid',5)->where('published_at','<=',Carbon::now())->take(10)->latest()->get();
        //创业好店
        $cybrands=Archive::where('flags','like','%'.'s'.'%')->where('mid','1')->whereIn('typeid',[1,3,4,5])->where('published_at','<=',Carbon::now())->take(8)->latest()->get();
        $cysbrands=Archive::where('flags','like','%'.'p'.'%')->where('mid','1')->whereIn('typeid',[1,3,4,5])->where('published_at','<=',Carbon::now())->take(11)->orderBy('click','desc')->get();
        $cybsbrands=Archive::where('flags','like','%'.'p'.'%')->where('mid','1')->whereIn('typeid',[1,3,4,5])->where('published_at','<=',Carbon::now())->skip(11)->take(8)->orderBy('click','desc')->get();
        //零食品牌
        $latestlingshibrands=Archive::where('mid','1')->whereIn('typeid',[1])->where('published_at','<=',Carbon::now())->take(27)->latest()->get();
        $latestrlingshibrands=Archive::where('mid','1')->whereIn('typeid',[1])->where('published_at','<=',Carbon::now())->skip(27)->take(60)->latest()->get();
        //炒货品牌
        $latestchaohuobrands=Archive::where('mid','1')->whereIn('typeid',[3])->where('published_at','<=',Carbon::now())->latest()->take(27)->get();
        $latestrchaohuobrands=Archive::where('mid','1')->whereIn('typeid',[3])->where('published_at','<=',Carbon::now())->latest()->skip(27)->take(18)->latest()->get();
        //进口零食
        $latestjinkoubrands=Archive::where('mid','1')->whereIn('typeid',[5])->where('published_at','<=',Carbon::now())->latest()->take(27)->get();
        $latestrjinkoubrands=Archive::where('flags','like','%'.'p'.'%')->where('mid','1')->whereIn('typeid',[5])->where('published_at','<=',Carbon::now())->latest()->take(18)->latest()->get();
        //大家都在看
        $seesbrands=Archive::where('flags','like','%'.'p'.'%')->where('mid','1')->whereIn('typeid',[1.3,4,5])->where('published_at','<=',Carbon::now())->take(3)->orderBy('click','desc')->get();
        $seesrbrands=Archive::where('flags','like','%'.'p'.'%')->where('mid','1')->whereIn('typeid',[1.3,4,5])->where('published_at','<=',Carbon::now())->skip(3)->take(5)->orderBy('click','desc')->get();
        //生意 大讲堂
        $askrows=Ask::where('is_hidden','1')->take(3)->get();
        //创业大讲堂
        $recommendnews=Archive::where('flags','like','%'.'c'.'%')->where('mid','<>','1')->where('typeid','<>',7)->where('published_at','<=',Carbon::now())->latest()->take(2)->orderBy('published_at','desc')->get();
        $latesnews=Archive::where('mid','<>','1')->where('typeid','<>',7)->where('published_at','<=',Carbon::now())->latest()->take(6)->orderBy('published_at','desc')->get();
        //人群解读
        $crowdnews=Archive::where('mid','<>','1')->where('typeid','<>',7)->where('published_at','<=',Carbon::now())->latest()->skip(6)->take(6)->orderBy('published_at','desc')->get();
        //采购信息
        $caiguonews=Archive::where('mid','<>','1')->where('typeid',7)->where('published_at','<=',Carbon::now())->latest()->take(10)->orderBy('published_at','desc')->get();
        //创业指导
        $chuangyenews=Archive::where('mid','<>','1')->where('typeid',2)->where('published_at','<=',Carbon::now())->latest()->take(8)->orderBy('published_at','desc')->get();

        //展会信息
        $zhbrands=Archive::latest()->whereIn('typeid',[8])->where('published_at','<=',Carbon::now())->orderBy('published_at','desc')->take(8)->get();
        //友情链接
        $flinks=flink::latest()->orderBy('created_at','desc')->take(30)->get();
        return view('frontend.index',compact('lingshibrands','chaohuobrands','ganguobrands',
            'jinkoubrands','cybrands','cysbrands','cybsbrands','latestlingshibrands','latestrlingshibrands','latestchaohuobrands',
            'latestrchaohuobrands','latestjinkoubrands','latestrjinkoubrands','seesbrands','seesrbrands','recommendnews','latesnews','crowdnews','zhbrands','flinks','askrows','caiguonews','chuangyenews'));
    }
    function demo()
    {
    return view('frontend.demo');
    }
}
