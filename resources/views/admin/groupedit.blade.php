@extends('admin.layouts.admin_app')
@section('head')
    <link href="/AdminLTE/dist/css/fileinput.min.css" rel="stylesheet">
@stop
@section('title') 会员组编辑@stop
@section('head')
    <style>td.newcolor span a{color: #ffffff; font-weight: 400; display: inline-block; padding: 2px;} td.newcolor span{margin-left: 5px;}</style>
@stop
@section('content')
    <div class="register-box">
        <div class="register-logo">
            <b>会员组添加</b>
        </div>
        <div class="register-box-body">
            <p class="login-box-msg">更改对应会员组信息</p>

            <form action="/admin/user/groupedit/{{$thisgroup->id}}" method="post">
                {{csrf_field()}}
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="groupname" placeholder="{{$thisgroup->groupname}}" value="{{$thisgroup->groupname}}">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">更改组信息</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
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
    <script src="/js/fileinput.min.js"></script>
@stop


