@extends('admin.layouts.admin_app')
@section('title')添加问答@stop
@section('head')
    <link href="/AdminLTE/plugins/iCheck/all.css" rel="stylesheet">
@stop
@section('content')
    <!-- row -->
    <div class="row">
        {{Form::open(array('route' => 'ask_create','files' => true,))}}
        <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">

                <!-- timeline time label -->
                <li class="time-label">
                  <span class="bg-red">
                     {{date("M j, Y")}}
                  </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->

                <li>
                    <i class="fa fa-pencil-square bg-blue"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:i')}}</span>

                        <h3 class="timeline-header"><a href="#">问答基本信息|</a> 按需填写</h3>

                        <div class="timeline-body basic_info">
                            <div class="form-group col-md-12">
                                {{Form::label('title', '问答标题', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('title', null, array('class' => 'form-control','id'=>'title','placeholder'=>'问答标题'))}}
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                {{Form::label('tags', '问答标签', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                                <div class="col-md-4 col-sm-9 col-xs-12">
                                    {{Form::text('tags', null, array('class' => 'form-control','id'=>'title','placeholder'=>'问答标签'))}}
                                </div>
                            </div>


                        </div>
                        <div class="timeline-footer">
                            <div class="col-sm-12 basic_info">
                                {{Form::radio('is_hidden', '1', true,array('class'=>"flat-red"))}} 已审核
                                {{Form::radio('is_hidden', '0',false,array('class'=>"flat-red"))}} 未审核
                            </div>
                            <button class="btn btn-primary btn-xs">Read more</button>
                        </div>
                    </div>
                </li>

                <li>
                    <i class="fa fa-file-text bg-maroon"></i>

                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {{date('H:m:s')}}</span>

                        <h3 class="timeline-header"><a href="#">问答描述</a>问答内容编辑</h3>

                        <div class="timeline-body">
                            @include('vendor.ueditor.assets')
                                    <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('container',{
                                    toolbars: [
                                        ['bold', 'italic', 'underline', 'strikethrough', 'blockquote','forecolor','backcolor',
                                            'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright',  'link', 'unlink', 'insertimage',
                                            'imageleft',
                                            'imageright',
                                            'imagecenter',
                                            'superscript',
                                            'subscript',
                                            'autotypeset',
                                            'lineheight',
                                            'pasteplain',
                                            'selectall',
                                            'removeformat',
                                            'formatmatch',
                                            'cleardoc',
                                            'rowspacingtop',
                                            'rowspacingbottom',
                                            'customstyle',
                                            'paragraph',
                                            'fontfamily',
                                            'fontsize',
                                            'directionalityltr',
                                            'directionalityrtl',
                                            'indent',
                                            'touppercase', //字母大写
                                            'tolowercase', //字母小写
                                            'anchor', //锚点
                                            'insertvideo','music',
                                            'insertcode', //代码语言
                                            'template', //模板
                                            'horizontal', //分隔线
                                            'time', //时间
                                            'date', //日期
                                            'spechars', //特殊字符
                                            'inserttable',
                                            'deletetable', //删除表格
                                            'insertparagraphbeforetable', //"表格前插入行"
                                            'insertrow', //前插入行
                                            'deleterow', //删除行
                                            'insertcol', //前插入列
                                            'deletecol', //删除列
                                            'mergecells', //合并多个单元格
                                            'mergeright', //右合并单元格
                                            'mergedown', //下合并单元格
                                            'splittocells', //完全拆分单元格
                                            'splittorows', //拆分成行
                                            'splittocols', //拆分成列
                                            'charts', // 图表
                                            'source', //源代码
                                            'emotion', 'fullscreen']
                                    ],
                                    elementPathEnabled: false,
                                    enableContextMenu: false,
                                    autoClearEmptyNode:true,
                                    wordCount:false,
                                    imagePopup:false,
                                    autotypeset:{ indent: true,imageBlockLine: 'center' }
                                });
                                ue.ready(function() {
                                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                });
                            </script>

                            <!-- 编辑器容器 -->
                            <script id="container" name="body" type="text/plain"></script>
                        </div>
                        <div class="timeline-footer">
                            <button type="submit"  class="btn btn-md bg-maroon">提交问答</button>
                        </div>
                    </div>
                </li>

                <!-- END timeline item -->
                <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                </li>
            </ul>

        </div>
        <!-- /.col -->
        {!! Form::close() !!}
    </div>
    @if(count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <!-- /.row -->

    </section>
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
    <script src="/AdminLTE/plugins/iCheck/icheck.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/AdminLTE/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/AdminLTE/dist/js/demo.js"></script>
    <script src="/AdminLTE/plugins/summernote/summernote.min.js"></script>
    <script src="/AdminLTE/plugins/summernote/lang/summernote-zh-CN.js"></script>
    <!-- iCheck -->
    <script src="/AdminLTE/plugins/iCheck/icheck.min.js"></script>
    <script src="/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>


    <script>



        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        })

    </script>

    <script>
        $(function () {
            $('#datepicker').datepicker({
                autoclose: true
            });

            //iCheck for checkbox and radio inputs
            $('.basic_info input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            //Red color scheme for iCheck
            $('.basic_info input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });
            //Flat red color scheme for iCheck
            $('.basic_info input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });


        });
    </script>

@stop

