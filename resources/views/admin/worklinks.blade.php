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
    <!-- jQuery 2.2.3 -->
    <script src="/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/AdminLTE/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/AdminLTE/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/AdminLTE/dist/js/demo.js"></script>
@stop


