@extends('frontend.frontend')
@section('title') {{$thistypeinfo->title}}@stop
@section('keywords') {{$thistypeinfo->keywords}} @stop
@section('description')  {{$thistypeinfo->description}}  @stop
@section('headlibs')
    <meta name="Copyright" content="58零食网-{{env('APP_URL')}}"/>
    <meta name="author" content="58零食网" />
    <meta http-equiv="mobile-agent" content="format=wml; url={{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=xhtml; url={{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" />
    <meta http-equiv="mobile-agent" content="format=html5; url={{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" />
    <link rel="alternate" media="only screen and(max-width: 640px)" href="{{str_replace('http://www.','http://m.',env('APP_URL'))}}{{Request::getrequesturi()}}" >
    <link rel="canonical" href="{{env('APP_URL')}}{{Request::getrequesturi()}}"/>
    <link rel="stylesheet" type="text/css" href="/reception/css/global.css"/>
    <link rel="stylesheet" type="text/css" href="/reception/css/news.css"/>
    <link rel="stylesheet" type="text/css" href="/reception/css/ask.css"/>
@stop
@section('main_content')
 @include('frontend.position')
    <!--主体开始-->
    <div class="main clearfix">
        <div class="center_list clearfix">
            <!--左边内容开始-->
            <div class="news_center">
                <div class="ww_330">
                                    <ul class="nav nav-tabs nav-tabs-zen mb10 mt10" style="background: none;">
                                        <li @if(request::getrequesturi()=='/ask/')class="active"@endif ><a href="/ask/">最新问答</a>
                                        </li>
                                        <li @if(request::getrequesturi()=='/ask/hot')class="active"@endif ><a  href="/ask/hot">热门问答</a></li>
                                        <li @if(request::getrequesturi()=='/ask/pending')class="active"@endif ><a href="/ask/pending">等待回答</a></li>
                                        <li><a data-toggle="modal" data-target=".bs-example-modal-lg" href="#">我要提问</a></li>
                                         </ul>
                                    <div class="stream-list question-stream">
                                        @foreach($asklists as $asklist)
                                        <section class="stream-list__item">
                                            <div class="qa-rank">
                                                <div class="votes hidden-xs">
                                                    {{$asklist->goodpost}}<small>得票</small>
                                                </div>
                                                <div class="answers @if($asklist->answernum >0) answered @endif @if($asklist->mid==1) solved @endif">
                                                    {{$asklist->answernum}}<small>@if($asklist->mid==1) 解决 @else 回答 @endif</small>
                                                </div>
                                                <div class="views hidden-xs @if($asklist->viewnum>90) viewsword100to999 @endif">
                                                    <span >{{$asklist->viewnum}}</span>
                                                    <small>浏览</small>
                                                </div>
                                            </div>
                                            <div class="summary">
                                                <ul class="author list-inline">
                                                    <li>
                                                        <span>{{$asklist->user->name}}</span>
                                                        <span class="split"></span>
                                                        <span>{{\Carbon\Carbon::parse($asklist->created_at)->diffForHumans()}}</span>
                                                    </li>
                                                </ul>
                                                <h2 class="title"><a href="/ask/{{$asklist->id}}.shtml">{{$asklist->title}}</a></h2>
                                                <ul class="taglist--inline ib">
                                                    @foreach(explode(',',str_replace('，',',',$asklist->tags))  as $tag)
                                                    <li class="tagPopup">
                                                        <span class="tag tag-sm" href="">{{$tag}}</span>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </section>
                                        @endforeach

                                    </div><!-- /.stream-list -->

                                    <div class="text-center">
                                        {!! preg_replace('/<a href=[\'\"]?([^\'\" ]+).*?>/','<a href="${1}/">',$asklists->links()) !!}
                                    </div>
 
                </div>
            </div>


		
                                <div class="new_right">
                                    <!--搜索开始-->
                                    <div class="new_bt">
                                        <div class="search_bc">
                                            <form  method="get">
                                                <input type="text"  class="new_input"  name="search">
                                                <input type="submit" class="new_btn" value="搜索">
                                            </form>
                                        </div>
                                        <!--搜索结束-->
                                    </div>
                                    <div class="new_bt">
                                        <h3> <i></i> 本周热门 </h3>
                                        <div class="rank_bd rank_bd1">
                                            <ul>
                                                @foreach($hotasks as $index=>$hotask)
                                                    <li class="top"> <i class="num">{{$index+1}}</i> <span class="name"><a href="/ask/{{$hotask->id}}.shtml" target="_blank" title="{{$hotask->title}}">{{$hotask->title}}</a></span> <span class="price">{{$hotask->answernum}}回答</span> </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!--排行榜-->
                                    <div class="new_bt">
                                        <h3> <i></i> 零食店加盟排行榜 </h3>
                                        <div class="rank_bd">
                                            <ul>
                                                @foreach($topbrands as $index=>$topbrand)
                                                    @if($index==0)
                                                        <li class="top"> <a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml" target="_blank" title="{{$topbrand->article['brandname']}}"><i class="num">{{$index+1}} </i> <img src="{{$topbrand->litpic}}" alt="{{$topbrand->article['brandname']}}" ></a>
                                                            <div class="cont">
                                                                <p><a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml" target="_blank">{{$topbrand->article['brandname']}}</a></p>
                                                                <p><span>投资金额：</span><i>{{$topbrand->article->brandpay}}</i></p>
                                                                <p class="btn"><a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml">查看详情</a></p>
                                                            </div>
                                                        </li>
                                                    @else

                                                        <li class="top"> <i class="num">{{$index+1}}</i> <span class="name"><a href="/{{$topbrand->arctype->real_path}}/{{$topbrand->id}}.shtml" target="_blank" title="{{$topbrand->article['brandname']}}">{{$topbrand->article['brandname']}}</a></span> <span class="price">{{$topbrand->article->brandpay}}</span> </li>
                                                    @endif

                                                @endforeach

                                            </ul>
                                        </div>
                                    </div>
                                    <!--排行榜-->


                                </div>
                                <!--右边结束-->
		
		
    </div>
    <!--主体结束-->
    <div class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">问题提问</h4>
                </div>
                <from onsubmit:return false;>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label for="title" class="control-label col-md-2 col-sm-3 col-xs-12">提问标题</label>
                        <div class="col-md-8 col-sm-9 col-xs-12">
                            <input class="form-control col-md-10" id="answertitle" placeholder="请输入您要提问的问题" name="title" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="tags" class="control-label col-md-2 col-sm-3 col-xs-12">问题标签</label>
                        <div class="col-md-8 col-sm-9 col-xs-12">
                            <input class="form-control col-md-10" id="tags" placeholder="多个标签用,分隔" name="tags" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="brandgroup" class="control-label col-md-2 col-sm-3 col-xs-12">问题描述</label>
                        <a href="#">问答描述</a>问答内容编辑
                        <div class="col-md-offset-1 col-md-10">
                        @include('vendor.ueditor.assets')
                        <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('container',{
                                    toolbars: [
                                        ['bold', 'italic', 'underline', 'strikethrough', 'blockquote', 'insertunorderedlist', 'insertorderedlist', 'justifyleft','justifycenter', 'justifyright']
                                    ],
                                    elementPathEnabled: false,
                                    enableContextMenu: false,
                                    autoClearEmptyNode:true,
                                    wordCount:false,
                                    imagePopup:false,
                                    initialFrameHeight:150,
                                    autotypeset:{ indent: true,imageBlockLine: 'center' }
                                });
                                ue.ready(function() {
                                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
                                });
                            </script>

                            <!-- 编辑器容器 -->
                            <script id="container" name="body" type="text/plain"></script>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button"  id="sub_answer" class="btn btn-primary">提交问题</button>
                </div>
                </from>
                @if(count($errors) > 0)
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

    </div>
	
<!--登录弹窗 开始-->
<div class="login_popup_mask"></div>
<div class="login_popup">
	<div class="hd"><a id="login_popup_close" class="close" href="javascript:void(0)" title="关闭">×</a><span class="tit">登录</span></div>
	<div class="bd">
		<div class="reg_box">
			<div class="login-title">注册新账号</div>
			<form class="form-horizontal1" role="form" method="POST" action="http://www.shangjicms.com/register">
				<input type="hidden" name="_token" value="PNNkSCoHUyDxxcXinRxsuV0lL0NkaZEBWkDB7gk2">
				<div class="form-group">
					<label for="name" class="control-label">用户名</label>
					<input id="name" type="text" class="form-control" name="name" value="" required autofocus placeholder="真实姓名或常用昵称">
				</div>
				<div class="form-group">
					<label for="email" class="control-label">邮箱</label>
					<input id="email" type="email" class="form-control" name="email" value="" required placeholder="邮箱">
				</div>
				<div class="form-group">
					<label for="email" class="control-label">手机号码</label>
					<input id="mobilephone" type="text" class="form-control" name="mobilephone" value="" required placeholder="仅支持大陆手机号">
				</div>
				<div class="form-group">
					<label for="password" class="control-label">密码</label>
					<input id="password" type="password" class="form-control" name="password" required placeholder="不少于 6 位">
				</div>
				<div class="form-group">
					<label for="password-confirm" class="control-label">确认密码</label>
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="再输入一遍密码">
				</div>
				<div class="form-group">
					<span class="other_link">同意并接受<a href="#" target="_blank">《服务条款》</a></span>
					<button type="submit" class="btn btn-primary">注册</button>
				</div>
			</form>
		</div>
		
		<div class="login_box">
			<div class="login-title">用户登录</div>
			<form class="form-horizontal1" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
				<div class="form-group">
					<label for="email" class="control-label">邮箱</label>
					<input id="email" type="email" class="form-control" name="email" value="" required placeholder="注册邮箱">
				</div>
				<div class="form-group">
					<label for="password" class="control-label">密码</label>
					<input id="password" type="password" class="form-control" name="password" required placeholder="密码">
				</div>
                <div class="form-group {{ $errors->has('captcha') ? ' has-error' : '' }}">
                    <label for="captcha" class="col-md-4 control-label">验证码</label>

                    <div class="col-md-6">
                        <input id="pcaptcha" type="text" class="form-control" name="captcha" required>

                        <a id="refresh-capthca"><img src="{{captcha_src()}}"
                                                     alt="验证码"
                                                     title="点击刷新图片"
                                                     width="160"
                                                     height="46" id="captcha" border="0" data-captcha-config="default" /> </a>
                    </div>
                    @if ($errors->has('captcha'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                    @endif
                </div>
				<div class="form-group">
					<span class="other_link"><label><input name="remember" type="checkbox" value="1" checked="">记住登录状态</label></span>
					<button type="submit" class="btn btn-primary">登录</button>
				</div>
				<div class="form-group"><a href="http://www.shangjicms.com/password/reset" target="_blank" class="forgot_link">忘记密码</a></div>
			</form>
		</div>
	</div>
</div>
<!--登录弹窗 结束-->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#sub_answer").click(function(){
                var auth="{{Auth::check()}}";
                var body=  ue.getContent();
                var tags=$('#tags[name="tags"]').val();
                var title=$('#answertitle[name="title"]').val();
                if(auth.length > 0){
                    $.ajax({
                        //提交数据的类型 POST GET
                        type:"POST",
                        //提交的网址
                        url:"/questions/add",
                        //提交的数据
                        data:{"title":title,"tags":tags,"body":body},
                        //返回数据的格式
                        datatype: "html",    //"xml", "html", "script", "json", "jsonp", "text".
                        success:function (response, stutas, xhr) {
                            alert(response);
                            window.location.href='/ask';
                        }
                    });
                } else{
				  $(".login_popup_mask,.login_popup").show();	
                }
            })

        })

    </script>

@stop