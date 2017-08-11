@inject('allnotifications',App\Notification')
@inject('taskDatas',App\Notification')
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">系统消息</h3>
            <ul class="control-sidebar-menu">
                @foreach($allnotifications->Allnotifications() as $allnotification)
                    @if($loop->index>3)
                        @break
                    @endif

                    @if(class_basename(($allnotification['type']))=='ArticlePublishedNofication')
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">{{$allnotification['data'][0]['write']}} :{{$allnotification['data'][0]['title']}}</h4>

                                    <p>时间：{{$allnotification['data'][0]['created_at']}}</p>
                                </div>
                            </a>
                        </li>

                    @else
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">{{$allnotification['data'][0]['name']}} </h4>

                                    <p>{{$allnotification['data'][0]['created_at']}} </p>
                                </div>
                            </a>
                        </li>

                    @endif

                @endforeach
            </ul>
            <!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                @foreach($taskDatas->taskNotification()['articleUsers'] as $articleUser)
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                {{$articleUser}}
                                <span class="label {{$taskDatas->taskNotification()['labelStyle'][rand(0,5)]}} pull-right">{{sprintf("%.4f",\App\AdminModel\Archive::where('created_at','>',\Carbon\Carbon::yesterday())->where('created_at','<',\Carbon\Carbon::now())->where('write',$articleUser)->count()/25,0,-1)*100}}%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-{{$taskDatas->taskNotification()['colorStyle'][rand(0,4)]}}" style="width: {{sprintf("%.4f",\App\AdminModel\Archive::where('created_at','>',\Carbon\Carbon::yesterday())->where('created_at','<',\Carbon\Carbon::now())->where('write',$articleUser)->count()/25,0,-1)*100}}%"></div>
                            </div>
                        </a>
                    </li>
                @endforeach

            </ul>
            <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">统计信息选项卡内容</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">常规设置</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        面板使用反馈
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        有关此常规设置选项的一些信息
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        允许邮件重定向
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        其他可用选项
                    </p>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        公开评论用户名
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        允许用户在博客帖子中显示其姓名
                    </p>
                </div>
                <!-- /.form-group -->

                <h3 class="control-sidebar-heading">对话设置</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        显示当前在线
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        关闭通知
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <!-- /.form-group -->

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        删除聊天记录
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>