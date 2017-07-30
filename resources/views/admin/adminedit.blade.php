@extends('admin.layouts.admin_app')
@section('head')
    <link href="/AdminLTE/dist/css/fileinput.min.css" rel="stylesheet">
@stop
@section('title') 后台用户编辑@stop
    @section('head')
<style>td.newcolor span a{color: #ffffff; font-weight: 400; display: inline-block; padding: 2px;} td.newcolor span{margin-left: 5px;}</style>
@stop
@section('content')
    <div class="register-box">
        <div class="register-box-body">
            <p class="login-box-msg">后台用户注册</p>
            {!! Form::model($adminUser,array('action' =>array('Admin\AdminController@Edit', $adminUser->id),'method' => 'put','files' => true)) !!}
            <i class="timeline-header no-border"><a href="#">用户头像</a> 图片上传</i>
            <div class="form-group has-feedback">
                    <img src="{{ $adminUser->portrait }}" class="img-rounded img-responsive"/>
                    {{Form::file('image', array('class' => 'file col-md-10','id'=>'input-2','multiple data-show-upload'=>"false",'data-show-caption'=>"true"))}}
            </div>
            <div class="form-group has-feedback">
                {{Form::text('name', null,array('class'=>'form-control','id'=>'name','readonly'=>'readonly','placeholder'=>'用户名'))}}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{Form::text('email', null,array('class'=>'form-control','id'=>'email','readonly'=>'readonly','placeholder'=>'登陆邮箱'))}}
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <select name="groupid" class="form-control">
                    @foreach($groups as $group)
                        <option value="{{$group->id}}">{{$group->groupname}}</option>
                    @endforeach
                </select>
                @if($adminUser->dutytype)
                <div class="form-group has-feedback" style="margin-top: 10px; padding-left: 10px;">
                    <label style="display: inline-block; margin-right: 10px;">
                        <input type="radio" name="dutytype" value="1" class="flat-red" @if($adminUser->dutytype) checked @endif>管理员
                    </label>
                    <label>
                        <input type="radio" name="dutytype" value="2" class="flat-red" @if($adminUser->dutytype ==2) checked @endif>普通会员
                    </label>
                </div>
                @endif
            </div>
            <div class="form-group has-feedback">
                {{Form::password('password', array('class'=>'form-control','id'=>'password','placeholder'=>'密码'))}}
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                {{Form::password('password_confirmation', array('class'=>'form-control','id'=>'password_confirmation','placeholder'=>'确认密码'))}}
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>

            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">提交</button>
                </div>
                <!-- /.col -->
            </div>
            {!! Form::close() !!}
            @if(count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
    <!-- /.row -->
    <!-- /.content -->
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


