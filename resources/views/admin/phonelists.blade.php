@extends('admin.layouts.admin_app')
@section('title')电话提交列表@stop
@section('head')
<style>td.newcolor span a{color: #ffffff; font-weight: 400; display: inline-block; padding: 2px;} td.newcolor span{margin-left: 5px;}</style>
@stop
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">电话提交列表</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th style="width: 10px">#ID</th>
                            <th>姓名</th>
                            <th>电话</th>
                            <th>性别</th>
                            <th>地址</th>
                            <th>备注</th>
                            <th>来源</th>
                            <th>提交页面</th>
                            <th>IP</th>
                            <th>提交时间</th>
                            <th>操作</th>
                        </tr>
                        @foreach($phoneNos as $adminlist)
                        <tr>
                            <td>{{$adminlist->id}}.</td>
                            <td>{{$adminlist->name}}</td>
                            <td>{{$adminlist->phoneno}}</td>
                            <td>{{$adminlist->gender}}</td>
                            <td>{{$adminlist->address}}</td>
                            <td>{{str_limit($adminlist->note,30,'')}}</td>
                            <td>{{str_limit($adminlist->referer,30,'...')}}</td>
                           <td>{{$adminlist->host}}</td>
                           <td>@foreach(\Zhuzhichao\IpLocationZh\Ip::find($adminlist->ip) as $loops=>$ip) @if($loops<3){{$ip}}- @endif @endforeach</td>
                            <td>{{$adminlist->created_at}}</td>
                            <td class="newcolor"><span class="badge bg-green"><a href="/admin/phone/edit/{{$adminlist->id}}">编辑</a></span> <span class="badge bg-red"><a href="/admin/phone/delete/{{$adminlist->id}}">删除</a> </span></td>
                        </tr>
                       @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    {!! $phoneNos->links() !!}
                </div>
            </div>
            <!-- /.box -->
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


