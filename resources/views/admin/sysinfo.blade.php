@extends('admin.layouts.admin_app')
@section('title')系统运行信息@stop
    @section('head')
    @stop
    @section('content')
        <div class="right_col" role="main">
            简介：零食品牌CMS是基于laravel5.3框架开发的CMS系统
            <hr/>
            当前版本V1.0
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
            <hr/>
            收录量：
            <hr/>
            当日收录：
            <hr/>

        </div>
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
