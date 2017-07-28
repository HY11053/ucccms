<?php

namespace App\Http\Controllers\Frontend;

use App\AdminModel\Answer;
use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Ask;
use App\Http\Requests\AnswerRequest;
use App\Overwrite\Paginator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AskController extends Controller
{
    //
    public function Index(Request $request,$page=0)
    {
        $thistypeinfo=Arctype::where('real_path','ask')->first();
        $asklists=Ask::latest()->paginate($perPage = 30, $columns = ['*'], $pageName = 'page', $page);
        $cid='ask';
        //转换自带分页器为自定义的分页器
        $asklists= Paginator::transfer(
            $cid,//传入分类id,
            $asklists//传入原始分页器
        );
        $topbrands=Archive::where('mid',1)->whereIn('typeid',[1,3,4,5,10])->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(10)->get();
        $hotasks=Ask::where('created_at','>',Carbon::parse('7 days ago')->toDateTimeString())->orderBy('answernum','desc')->take(10)->get();
        return view('frontend.ask',compact('thistypeinfo','asklists','hotasks','topbrands'));
    }
    public function HotAsks($page=0)
    {
        $thistypeinfo=Arctype::where('real_path','ask')->first();
        $asklists=Ask::latest()->paginate(10);
        //dd($pagelists);
        $asklists=Ask::where('answernum','>','5')->orderBy('answernum','desc')->paginate($perPage = 30, $columns = ['*'], $pageName = 'page', $page);
        $cid='ask';
        //转换自带分页器为自定义的分页器
        $asklists= Paginator::transfer(
            $cid,//传入分类id,
            $asklists//传入原始分页器
        );
        $topbrands=Archive::where('mid',1)->whereIn('typeid',[1,3,4,5,10])->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(10)->get();
        $hotasks=Ask::where('created_at','>',Carbon::parse('7 days ago')->toDateTimeString())->orderBy('answernum','desc')->take(10)->get();

        return view('frontend.ask',compact('thistypeinfo','asklists','hotasks','topbrands'));
    }
    public function PendingAsks($page=0)
    {
        $thistypeinfo=Arctype::where('real_path','ask')->first();
        $asklists=Ask::where('answernum','0')->latest()->paginate($perPage = 30, $columns = ['*'], $pageName = 'page', $page);
        $cid='ask';
        //转换自带分页器为自定义的分页器
        $asklists= Paginator::transfer(
            $cid,//传入分类id,
            $asklists//传入原始分页器
        );
        $topbrands=Archive::where('mid',1)->whereIn('typeid',[1,3,4,5,10])->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(10)->get();
        $hotasks=Ask::where('created_at','>',Carbon::parse('7 days ago')->toDateTimeString())->orderBy('answernum','desc')->take(10)->get();

        return view('frontend.ask',compact('thistypeinfo','asklists','hotasks','topbrands'));

    }
    public  function AskArticle($id)
    {
        $thisaskinfo=Ask::findOrFail($id);
        $thisaskanswers=Answer::where('ask_id',$id)->get();
        $topbrands=Archive::where('mid',1)->whereIn('typeid',[1,3,4,5,10])->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(10)->get();
        $latesnews=Archive::where('ismake',1)->where('mid','<>',1)->whereIn('typeid',[1,3,4,5,9])->where('published_at','<=',Carbon::now())->latest()->take(10)->get();
        $hotasks=Ask::where('created_at','>',Carbon::parse('7 days ago')->toDateTimeString())->orderBy('answernum','desc')->take(10)->get();
        Ask::where('id',$id)->update(['viewnum'=>$thisaskinfo->viewnum+1]);
        return view('frontend.ask_article',compact('thisaskinfo','thisaskanswers','topbrands','latesnews','hotasks'));
    }
}
