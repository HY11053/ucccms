<?php

namespace App\Http\Controllers\Frontend;

use App\AdminModel\Answer;
use App\AdminModel\Ask;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function AnswerCreate(Request $request,$id)
    {
        $this->validate($request, [
            'content' => 'required|min:100',
        ]);
        $request['ask_id']=$id;
        $request['ip']=$request->getClientIp();
        $request['user_id']=auth('web')->user()->id;
        Answer::create($request->all());
        Ask::where('id',$id)->update(['answernum'=>Ask::where('id',$id)->value('answernum')+1]);

        return redirect()->back();
    }


}
