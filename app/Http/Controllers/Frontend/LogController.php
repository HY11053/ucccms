<?php

namespace App\Http\Controllers\Frontend;

use App\AdminModel\Addonarticle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LogController extends Controller
{
    public function LogView(Request $request,$data='access20170512')
    {
        $contents=explode("\n",file_get_contents(public_path('abdclog/'.$data.'.log')));
        $robots=array();
        foreach ($contents as $content)
        {
            preg_match('|(^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})[- -]+([\[].*[\]])[ ]+[\"]([A-Z]+) ([^\s]+) ([A-Z]+[\/][0-9].[0-9])[\"] ([0-9]+) [0-9-]+ [\"][-][\"] [\"][A-Za-z-/0-9. ]+[\(A-Za-z;]+ ([A-Za-z/0-9\.\; \+:]+)[\)][\"]|',$content,$match);

            if (!empty($match) && strpos($match[7],'baidu')){
                //dd($match);
                $robots[]=$match;

            }
            if(strpos($data,'m')==0)
            {
                preg_match('|(^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3})[- -]+([\[].*[\]])[ ]+[\"]([A-Z]+) ([^\s]+) ([A-Z]+[\/][0-9].[0-9])[\"] ([0-9]+) [0-9-]+ [\"]([^\s]+)[\s][\"][\w]+[\/][0-9\.\s]+[\(\w;\s]+[\)][\s\w\/\.\(,]+[\)][\s\w\/\.]+[\(\w;]+([\s]+[\w\-\/\.;\s+\+:]+)[\)][\"]|',$content,$match2);
                if (!empty($match2) && strpos($match2[8],'baidu')){
                    $match2[7]=$match2[8];
                    $robots[]=$match2;
                }
            }

        }

        return view('frontend.log',compact('robots'));
    }


}
