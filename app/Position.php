<?php
/**
 * Created by PhpStorm.
 * User: liang
 * Date: 2017/4/7
 * Time: 12:53
 */
namespace App;
use App\AdminModel\Arctype;
use Illuminate\Http\Request;

class Position{
    function Positions($path){
        preg_match('/(^[\/])[\w\/]+[\/$]/',$path,$matches);
        //dd($matches[0]);
        if(!empty($matches)){
            $matches[0]=preg_replace('/\/page\/(\d+)\//', '', $matches[0]);
            $typeinfos=Arctype::where('real_path',substr($matches[0],1,-1))->first();
            if(empty($typeinfos))
            {
                $typeinfos=Arctype::where('real_path',substr($matches[0],1))->first();
            }
        }else{
            preg_match('/(^[\/])[\w\/]+/',$path,$matches);
            $matches[0]=preg_replace('/page\/(\d+)\//', '', $matches[0]);

            $typeinfos=Arctype::where('real_path',substr($matches[0],1))->first();
        }
        return $typeinfos;

    }
}