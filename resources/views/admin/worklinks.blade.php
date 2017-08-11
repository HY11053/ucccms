@extends('admin.layouts.admin_app')
@section('title')前台会员列表
@stop
@section('head')
    <style>li{list-style-type: none;}</style>
@stop
@section('content')
    <h3>工作链接生成</h3>
    @foreach($links as $link)
        <li>{{env('APP_URL')}}/{{$link->arctype->real_path}}/{{$link->id}}.shtml@ {{$link->title}}</li>
    @endforeach
@stop

@section('libs')
@stop


