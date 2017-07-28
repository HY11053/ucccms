<?php

namespace App\Http\Controllers\Frontend;

use App\AdminModel\Addonarticle;
use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Area;
use App\AdminModel\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
   public function Search(Request $request,$p1=[],$p2='',$p3='',$p4='')
   {
       preg_match('/project\/([0-9]+)-([0-9~]+)-([0-9~]+)-([0-9]+)\.shtml/',$request->path(),$matches);
       switch ($matches[1]){
           case 0:
               $brand='零食店品牌';
               break;
           case 1:
               $brand='零食店品牌';
               break;
           case 2:
               $brand='炒货店品牌';
               break;
           case 3:
               $brand='干果店品牌';
               break;
           case 3:
               $brand='进口零食品牌';
               break;

       }
       $tz=$matches[2]?$matches[2].'万':'';
       $squares=$matches[3]?$matches[3].'平米':'';
       $city=$matches[4]?Area::where('id',$matches[4])->value('city'):'';
       $title= $city.$tz.$squares.$brand;
       //dd($matches);
        $p1=$p1==0?Arctype::where('mid','1')->pluck('id'):array($p1);
        $p2=empty($p2)?'':$p2;
        $p3=empty($p3)?'':$p3;
        $p4=empty($p4)?'':Area::where('id',$p4)->value('city');
        $ids=Addonarticle::whereIn('typeid',$p1)->where('brandpay','like','%'.$p2.'%')->where('acreage','like','%'.$p3.'%')->where('brandaddr','like','%'.$p4.'%')->where('created_at','<=',Carbon::now())->latest()->pluck('id');
        $arrs=[];
        for ($i=0;$i<count($ids);$i++)
        {
            $mid=Archive::where('id',$ids[$i])->get();
            if( $mid[0]->mid==1){
                $arrs[]=$mid[0]->id;
            }


        }
       $pagelists=Archive::whereIn('id',$arrs)->latest()->paginate(10);
        $topbrands=Archive::where('mid',1)->where('ismake','1')->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(9)->get();
        $newsbrands=Archive::where('ismake','1')->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(10)->get();
        $brandtypes=Arctype::where('mid',1)->get();
        $comments=Comment::where('is_hidden',0)->latest()->take(5)->get();
       return view('frontend.project',compact('pagelists','topbrands','newsbrands','brandtypes','comments','title'));
   }
   public function SearchAjax(Request $request)
   {
       $url=env('APP_URL').'/project/'.$request->input('cname').'-'. str_replace('万','',$request->input('brandpay')).'-'.str_replace('平米','',$request->input('acreage')).'-0.shtml';
       return $url;

   }
}
