@extends('admin.layouts.admin_app')
@section('title')系统运行信息@stop
    @section('head')
    @stop
    @section('content')
        <div class="right_col" role="main">
            简介：LARSTYCMSV2.0是基于laravel5.4框架开发的CMS系统,包含普通文章和品牌文档的发布、审核、预发布、自动推送等一系列文档发布功能；
            问答模块、评论模块、友情链接模块、系统用户管理及授权、电话提交管理、微信公众平台，消息推送通知等集于一体的功能。
            <hr/>
            当前版本V2.0
            <hr/>
            运行环境信息：{{$_SERVER['SERVER_SOFTWARE']}}
            <hr/>
            数据库类型：{{env('DB_CONNECTION')}}
            <hr/>
            当前登录用户名：{{auth('admin')->user()->name}}
            <hr/>
            文章总数：{{\App\AdminModel\Archive::max('id')}}
            <hr/>
            问答总数：{{\App\AdminModel\Ask::max('id')}}

        </div>
    @stop

    @section('libs')
@stop
