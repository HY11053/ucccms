<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>日志分析</title>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<h1 class="text-center">日志分析</h1>
<hr/>
<div class="col-md-12"><em>共有：{{count($robots)}}个记录</em></div>
<div class="col-md-12">
    <div class="bs-example" data-example-id="hoverable-table">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>id</th>
                <th>IP地址</th>
                <th>抓取时间</th>
                <th>请求方式</th>
                <th>抓取页面</th>
                <th>HTTP版本</th>
                <th>状态码</th>
                <th>蜘蛛标头</th>
            </tr>
            </thead>
            <tbody>
            @foreach($robots as $index=>$robot)
                <tr>
                    <th scope="row">{{$index+1}}</th>
                    <td>{{$robot[1]}}</td>
                    <td>{{$robot[2]}}</td>
                    <td>{{$robot[3]}}</td>
                    <td>{{$robot[4]}}</td>
                    <td>{{$robot[5]}}</td>
                    <td @if($robot[6]!=200) style="color: red" @endif>{{$robot[6]}}</td>
                    <td>{{$robot[7]}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

