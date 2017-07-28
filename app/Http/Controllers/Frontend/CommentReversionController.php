<?php

namespace App\Http\Controllers\Frontend;

use App\AdminModel\CommentReversion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentReversionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function CommentReversion(Request $request,$id)
    {
        //dd($request->all());
        $request['archive_id']=$id;
        $request['comment_id']=$request['parent_id'];
        $request['user_id']=auth('web')->user()->id;
        $request['ip']=$request->getClientIp();
        if(count(CommentReversion::where('user_id',auth('web')->user()->id)->where('created_at','>',Carbon::today())->get())>5)
        {
            abort(404,'禁止恶意回复');
        }
        if(count(CommentReversion::where('user_id',auth('web')->user()->id)->where('created_at','>',Carbon::today())->pluck('ip'))>100)
        {
            abort(404,'禁止恶意回复');
        }
        CommentReversion::create($request->all());
        return CommentReversion::latest()->first()->toJson();
    }
}
