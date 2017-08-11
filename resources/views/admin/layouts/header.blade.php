@inject('notifications',App\Notification')
@inject('articlenotifications',App\Notification')
@inject('taskDatas',App\Notification')
<header class="main-header">
    <!-- Logo -->
    <a href="/admin/index" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>L</b>TY</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>LARSTY</b>CMSV2.0</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">{{count($notifications->Notificate())}}</span>
                    </a>
                    <ul class="dropdown-menu">

                        <li class="header">你有{{count($notifications->Notificate())}}条邮件已发送</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach($notifications->Notificate() as $notification)
                                    @if($loop->index>6)
                                        @break
                                    @endif
                                    <li><!-- start message -->

                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="@if(auth('admin')->user()->portrait) {{auth('admin')->user()->portrait}} @else /AdminLTE/dist/img/user3-128x128.jpg @endif" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                邮件信息
                                                <small><i class="fa fa-clock-o"></i>{{\Carbon\Carbon::parse($notification['created_at'])->diffForHumans()}}</small>
                                            </h4>
                                            <p>{{$notification['name']}}--{{$notification['created_at']}}已发送</p>
                                        </a>
                                    </li>
                            @endforeach
                            <!-- end message -->

                            </ul>
                        </li>
                        <li class="footer"><a href="/admin/clearnotification">清除所有邮件提示信息</a></li>
                    </ul>
                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">{{count($articlenotifications->ArticleNotificate())}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">你有 {{count($articlenotifications->ArticleNotificate())}} 新通知</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">

                                @foreach($articlenotifications->ArticleNotificate() as $articlenotification)
                                    @if($loop->index>6)
                                        @break
                                    @endif
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i>{{$articlenotification['write']}} 发布文章{{$articlenotification['title']}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer"><a href="/admin/clearnotification">清除所有消息通知</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">{{count($taskDatas->taskNotification()['articleUsers'])}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{count($taskDatas->taskNotification()['articleUsers'])}} tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach($taskDatas->taskNotification()['articleUsers'] as $articleUser)
                                    <li>
                                        <a href="#"><!-- Task item -->
                                            <h3>
                                                {{$articleUser}}
                                                <small class="pull-right">{{sprintf("%.4f",\App\AdminModel\Archive::where('created_at','>',\Carbon\Carbon::yesterday())->where('created_at','<',\Carbon\Carbon::now())->where('write',$articleUser)->count()/25,0,-1)*100}}%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-{{$taskDatas->taskNotification()['colorStyle'][rand(0,4)]}}" style="width: {{sprintf("%.4f",\App\AdminModel\Archive::where('created_at','>',\Carbon\Carbon::yesterday())->where('created_at','<',\Carbon\Carbon::now())->where('write',$articleUser)->count()/25,0,-1)*100}}%" role="progressbar" aria-valuenow="{{sprintf("%.4f",\App\AdminModel\Archive::where('created_at','>',\Carbon\Carbon::yesterday())->where('created_at','<',\Carbon\Carbon::now())->where('write',$articleUser)->count()/25,0,-1)*100}}" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">{{sprintf("%.4f",\App\AdminModel\Archive::where('created_at','>',\Carbon\Carbon::yesterday())->where('created_at','<',\Carbon\Carbon::now())->where('write',$articleUser)->count()/25,0,-1)*100}}% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">see all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="@if(auth('admin')->user()->portrait) {{auth('admin')->user()->portrait}} @else /AdminLTE/dist/img/user3-128x128.jpg @endif" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{auth('admin')->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="@if(auth('admin')->user()->portrait) {{auth('admin')->user()->portrait}} @else /AdminLTE/dist/img/user3-128x128.jpg @endif" class="img-circle" alt="User Image">

                            <p>
                                {{auth('admin')->user()->name}} - Web Developer
                                <small>{{date("Y-m-D",time())}}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">个人中心</a>
                            </div>
                            <div class="pull-right">
                                <a href="/admin/logout" class="btn btn-default btn-flat">注销登录</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>