<?php

namespace App\Http\Controllers\Frontend;

use App\AdminModel\Ask;
use App\Http\Requests\AnswerRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Add(AnswerRequest $request)
    {
        //同一账号只能提问两次或当前IP只能提问十次
        /*if(count(Ask::where('user_id',auth('web')->user()->id)->where('created_at','>',Carbon::today())->get())>1 || count(Ask::where('created_at','>',Carbon::today())->pluck('ip'))>10)
        {
            return '请不要恶意提问';
        }*/
        $request['user_id']=auth('web')->user()->id;
        $request['ip']=$request->getClientIp();
        //$request['body']=preg_replace("","",$request['body']);
        Ask::create($request->all());
        return '问题提交成功';

    }
}
