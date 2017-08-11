<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Archive;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }
    public function Index(){
        $articleUsers=array_unique(Archive::where('created_at','>',Carbon::today())->where('created_at','<',Carbon::now())->pluck('write')->toArray());
        $colorStyle=['aqua','green','blue','red','yellow'];
        $newArticles=Archive::take(6)->orderByDesc('id')->get();
        $labelStyle=['label-danger','label-info','label-warning','label-success','label-primary','label-default'];
        return view('admin.admin_index',compact('articleUsers','colorStyle','newArticles','labelStyle'));
    }
}
