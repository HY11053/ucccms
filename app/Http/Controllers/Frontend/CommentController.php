<?php

namespace App\Http\Controllers\Frontend;

use App\AdminModel\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function PostComment(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:100',
        ]);
        $request['ip']=$request->getClientIp();
        $request['user_id']=auth('web')->user()->id;
        //同一账号每天每篇文章只能评论一次
        if(count(Comment::where('user_id',auth('web')->user()->id)->where('archive_id',$request->archive_id)->where('created_at','>',Carbon::today())->get())>0)
        {
            abort(404,'请不要恶意评论');
        }
        //IP限制

        if(count(Comment::where('created_at','>',Carbon::today())->pluck('ip'))>100)
        {
            abort(404,'请不要恶意评论');
        }
        Comment::create($request->all());
        return redirect()->back();
    }

}
