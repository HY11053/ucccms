<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatementController extends Controller
{
    //
    public function about()
    {
        return view('mobile.about');
    }
    public function law()
    {
        return view('mobile.law');
    }
    public function map()
    {
        return view('mobile.map');
    }
    public function contact()
    {
        return view('mobile.contact');
    }
}
