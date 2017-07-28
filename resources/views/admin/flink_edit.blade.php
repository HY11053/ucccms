@extends('admin.layouts.admin_app')
@section('title')编辑友情链接@stop
@section('head')
@stop
@section('content')

    <div class="row">
        <div class="col-md-10 box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">添加友情链接</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
                {!! Form::model($thislink,array('action' =>array('Admin\FlinkController@PostEditFlink', $thislink->id),'method' => 'put')) !!}
                <div class="box-body">
                    <div class="form-group">
                        {{Form::label('weburl','网站域名')}}
                        {{Form::text('weburl', null,array('class'=>'form-control','id'=>'url','placeholder'=>'网站域名'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('webname','网站名称')}}
                        {{Form::text('webname', null,array('class'=>'form-control','id'=>'webname','placeholder'=>'网站名称'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('address','联系方式')}}
                        {{Form::text('address', null,array('class'=>'form-control','id'=>'address','placeholder'=>'联系方式'))}}
                    </div>
                    <div class="form-group">
                        {{Form::label('note','操作备注')}}
                        {{Form::text('note', null,array('class'=>'form-control','id'=>'note','placeholder'=>'操作备注'))}}
                    </div>

                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
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

    </div>
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
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
        });
        function AjDelete (id,node) {
            var id = id;
            var node=node;
            $.ajax({
                //提交数据的类型 POST GET
                type:"POST",
                //提交的网址
                url:"/admin/article/delete/"+id,
                //提交的数据
                data:{"id":id,'node':node},
                //返回数据的格式
                datatype: "html",    //"xml", "html", "script", "json", "jsonp", "text".
                success:function (response, stutas, xhr) {
                    $(".modal-s-m"+id+" .modal-body").html(response);
                    $("#btn-"+id).attr("disabled","disabled");

                }
            });
        }
    </script>
@stop


