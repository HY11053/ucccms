<?php

namespace App\Http\Controllers\Mobile;

use App\AdminModel\Answer;
use App\AdminModel\Archive;
use App\AdminModel\Arctype;
use App\AdminModel\Ask;
use App\AdminModel\Comment;
use App\Overwrite\Paginator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MobileController extends Controller
{
    /*
     * 首页
     */
    public function Index()
    {
        //头部导航
        $headers=Arctype::whereIn('id',[1,3,4,5,2,7,8,9])->take(8)->get();
        //l零食品牌
        $lingshibrands=Archive::where('flags','like','%'.'c'.'%')->where('mid','1')->where('typeid',1)->where('published_at','<=',Carbon::now())->take(3)->latest()->get();
        $lingshibrandls=Archive::where('mid','1')->where('typeid',1)->where('published_at','<=',Carbon::now())->skip(3)->take(5)->latest()->get();
        //炒货品牌
        $chaohuobrands=Archive::where('flags','like','%'.'c'.'%')->where('mid','1')->where('typeid',3)->take(3)->where('published_at','<=',Carbon::now())->latest()->get();
        $chaohuobrandls=Archive::where('mid','1')->where('typeid',3)->skip(3)->where('published_at','<=',Carbon::now())->take(5)->latest()->get();
        //干果品牌
        $ganguobrands=Archive::where('flags','like','%'.'c'.'%')->where('mid','1')->where('typeid',4)->take(3)->where('published_at','<=',Carbon::now())->latest()->get();
        $ganguobrandls=Archive::where('mid','1')->where('typeid',4)->skip(3)->where('published_at','<=',Carbon::now())->take(5)->latest()->get();
        $jinkoubrands=Archive::where('flags','like','%'.'c'.'%')->where('mid','1')->where('typeid',5)->take(3)->where('published_at','<=',Carbon::now())->latest()->get();
        $jinkoubrandls=Archive::where('mid','1')->where('typeid',5)->skip(3)->where('published_at','<=',Carbon::now())->take(5)->latest()->get();
        //最新品牌
        $newbrands=Archive::where('flags','like','%'.'p'.'%')->where('mid','1')->whereIn('typeid',[1,3,4,5])->where('published_at','<=',Carbon::now())->take(3)->latest()->get();
        $newbrandls=Archive::where('mid','1')->whereIn('typeid',[1,3,4,5])->where('published_at','<=',Carbon::now())->skip(3)->take(5)->latest()->get();
        //资讯
        $newsarticles=Archive::where('typeid',2)->take(8)->where('published_at','<=',Carbon::now())->latest()->get();
        //问答
        $asks=Ask::where('is_hidden',1)->take(8)->get();
        return view('mobile.index',compact('lingshibrands','lingshibrandls','chaohuobrands','chaohuobrandls',
            'ganguobrands','ganguobrandls','jinkoubrands','jinkoubrandls','newbrands','newbrandls','newsarticles','asks','headers'));
    }
    /*
     * 品牌列表页
     */
    public function BrandLists(Request $request,$path,$page=0)
    {
        $cid=$path;
        //判断当前栏目类型并返回给定视图及数据
        if(Arctype::where('real_path',$path)->value('mid')==1)
        {
            $pagelists=Archive::where('typeid',Arctype::where('real_path',$path)->value('id'))->where('mid',1)->where('ismake','1')->where('published_at','<=',Carbon::now())->latest()->paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page);
            //转换自带分页器为自定义的分页器
            $pagelists= Paginator::transfer(
                $cid,//传入分类id,
                $pagelists//传入原始分页器
            );
            $topbrands=Archive::where('mid',1)->where('ismake','1')->whereIn('typeid',[1,3,4,5,10])->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(9)->get();
            $newsbrands=Archive::where('ismake','1')->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(10)->get();
            $brandtypes=Arctype::where('mid',1)->get();
            $thistypeinfo=Arctype::where('real_path',$path)->first();
            $comments=Comment::where('is_hidden',0)->latest()->take(5)->get();

            return view('mobile.brands_list',compact('pagelists','topbrands','newsbrands','brandtypes','thistypeinfo','comments'));
        }else{

            if(Arctype::where('real_path',$path)->value('id')==null)
            {
                abort(404);
            }
            if(Arctype::where('real_path',$path)->value('id')==2)
            {
                $pagelists=Archive::whereIn('typeid',Arctype::whereIn('id',[1,2,3,4,5,9])->pluck('id'))->where('mid','<>',1)->where('ismake','1')->where('published_at','<=',Carbon::now())->latest()->paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page);

            }else{
                $pagelists=Archive::where('typeid',Arctype::where('real_path',$path)->value('id'))->where('mid','<>',1)->where('ismake','1')->where('published_at','<=',Carbon::now())->latest()->paginate($perPage = 10, $columns = ['*'], $pageName = 'page', $page);

            }
            //转换自带分页器为自定义的分页器
            $pagelists= Paginator::transfer(
                $cid,//传入分类id,
                $pagelists//传入原始分页器
            );
            $topnews=Archive::where('mid','<>',1)->where('ismake','1')->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(5)->get();
            $thistypeinfo=Arctype::where('real_path',$path)->first();
            return view('mobile.lists',compact('pagelists','topnews','newsbrands','thistypeinfo'));
        }

    }

    /*
     * 内容页面
     */

public function BrandArticle(Request $request,$path,$id)
{
    preg_match('/[a-zA-Z]+/',$request->path(),$matchs);
    if (Archive::findOrFail($id)->arctype->real_path!=$matchs[0])
    {
        abort(404);
    }else{
        if(Archive::findOrFail($id)->mid ==1)
        {
            $thisarticleinfos=Archive::findOrFail($id);
            $topbrands=Archive::where('mid',1)->whereIn('typeid',[1,3,4,5,10])->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(10)->get();
            $latestbrands=Archive::where('mid',1)->whereIn('typeid',[1,3,4,5,10])->where('published_at','<=',Carbon::now())->latest()->take(20)->get();
            $comments=Comment::where('archive_id',$thisarticleinfos->id)->where('is_hidden',0)->get();
            $latesnews=Archive::where('ismake',1)->where('mid','<>',1)->whereIn('typeid',[1,3,4,5,9])->where('published_at','<=',Carbon::now())->latest()->take(10)->get();
            $xgsearchs=Archive::where('ismake','1')->where('shorttitle','like','%'.$thisarticleinfos->article->brandname.'%')->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(10)->get();
            return view('mobile.brand_article',compact('thisarticleinfos','topbrands','latestbrands','comments','latesnews','xgsearchs'));
        }else{
            $thisarticleinfos=Archive::findOrFail($id);
            $topbrands=Archive::where('mid',1)->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(10)->get();
            $latestbrands=Archive::where('mid',1)->where('published_at','<=',Carbon::now())->latest()->take(20)->get();
            $prev_article = Archive::latest('published_at')->published()->find($this->getPrevArticleId($thisarticleinfos->id));
            $next_article = Archive::latest('published_at')->published()->find($this->getNextArticleId($thisarticleinfos->id));
            $comments=Comment::where('archive_id',$thisarticleinfos->id)->where('is_hidden',0)->get();
            $latesnews=Archive::where('ismake',1)->where('mid','<>',1)->whereIn('typeid',[1,3,4,5,9])->where('published_at','<=',Carbon::now())->latest()->take(10)->get();
            $xgsearchs=Archive::where('ismake','1')->where('shorttitle','like','%'.$thisarticleinfos->shorttitle.'%')->where('published_at','<=',Carbon::now())->orderBy('click','desc')->take(10)->get();
            return view('mobile.article_article',compact('thisarticleinfos','prev_article','next_article','topbrands','comments','latesnews','xgsearchs'));
        }

    }
}
    protected function getPrevArticleId($id)
    {
        return Archive::where('id', '<', $id)->max('id');
    }
    protected function getNextArticleId($id)
    {
        return Archive::where('id', '>', $id)->min('id');
    }
    //问答页面
    //
    public function Indexask(Request $request,$page=0)
    {
        $thistypeinfo=Arctype::where('real_path','ask')->first();
        $asklists=Ask::latest()->paginate($perPage = 30, $columns = ['*'], $pageName = 'page', $page);
        $cid='ask';
        //转换自带分页器为自定义的分页器
        $asklists= Paginator::transfer(
            $cid,//传入分类id,
            $asklists//传入原始分页器
        );
        return view('mobile.ask_list',compact('thistypeinfo','asklists'));
    }
    public function HotAsks($page=0)
    {
        $thistypeinfo=Arctype::where('real_path','ask')->first();
        $asklists=Ask::where('answernum','>','5')->orderBy('answernum','desc')->paginate($perPage = 30, $columns = ['*'], $pageName = 'page', $page);
        $cid='ask';
        //转换自带分页器为自定义的分页器
        $asklists= Paginator::transfer(
            $cid,//传入分类id,
            $asklists//传入原始分页器
        );
        return view('mobile.ask_list',compact('thistypeinfo','asklists'));
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
        return view('mobile.ask_list',compact('thistypeinfo','asklists'));

    }
    public  function AskArticle($id)
    {
        $thisaskinfo=Ask::findOrFail($id);
        $thisaskanswers=Answer::where('ask_id',$id)->get();
        return view('mobile.ask_article',compact('thisaskinfo','thisaskanswers'));
    }
}
