<div class="comments-container" id="js_join_7">
    <div class="comments-box">
        <div class="pull-left">
            <img class="avatar-32 " src="/reception/images/user-128.png" alt=""/>
        </div>
        <div class="comments-box-content">
            <form action="/comments" method="post">
                {{ csrf_field() }}
                <div class="form-group mb0">
                    <textarea name="content" rows="3" class="form-control" id="commentcontent" placeholder="文明社会，理性评论"></textarea>
                    <div class="mt15 text-right">
                        <input type="hidden" name="archive_id" value="{{$thisarticleinfos->id}}">
                        <button class=" btn btn-primary" type="submit">发布评论</button>
                    </div>
                    @if ($errors->has('content'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<!--登录弹窗 开始-->
<div class="login_popup_mask" id="commentuser"></div>
<div class="login_popup">
	<div class="hd"><a id="login_popup_close" class="close" href="javascript:void(0)" title="关闭">×</a><span class="tit">登录</span></div>
	<div class="bd">
		<div class="reg_box">
			<div class="login-title">注册新账号</div>
			<form class="form-horizontal" role="form" method="POST" action="http://www.shangjicms.com/register">
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
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
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
				<div class="form-group"><a href="/password/reset" target="_blank" class="forgot_link">忘记密码</a></div>
			</form>
		</div>
	</div>
</div>
<!--登录弹窗 结束-->

@if(count($comments)>0)
<div class="xg_news">
    <div class="title"><strong>内容评论</strong></div>
    <div class="xw">
        <ul class="clearfix">
            @foreach($comments as $comment)
                <div class="comment " id="reply-{{$comment->id}}">
                    <a class="avatar avatar-large">
                        <img class="b-lazy b-loaded" src="/AdminLTE/dist/img/avatar2.png">
                    </a>
                    <div class="content">
                        <span class="author">{{$comment->user->name}}</span>

                        <div class="metadata">
                            <span class="date">{{$comment->updated_at}}</span>
                        </div>
                        <div class="text Post-body">
                            <p>{{$comment->content}}</p>
                        </div>
                        <div class="actions">
                            <a class="reply" data-parent_id="{{$comment->id}}" data-conversation-id="32" data-username="{{$comment->user->name}}" data-userid="{{$comment->user->id}}" data-comment-type="article" data-url="/commentreversion/{{$comment->archive->id}}">回复</a>
                            <a class="save">分享</a>
                        </div>
                        <div class="reply-form-container"></div>
                    </div>
                </div>
                @foreach($comment->reversion as $reversion)
                    <div class="comments" style="margin-top:-2.5em;">
                        <div class="comment ">
                            <a class="avatar">  <img src="/AdminLTE/dist/img/avatar3.png"></a>
                            <div class="content">
                                <span class="author">{{$reversion->user->name}}</span>
                                <div class="metadata">
                                    <span class="date">{{$reversion->updated_at}}</span> </div>
                                <div class="text Post-body" id="Comment__Post_content">
                                    <p>{{$reversion->content}}</p>
                                </div>
                                <div class="actions">
                                    <a class="reply" data-parent_id="{{$comment->id}}" data-conversation-id="89" data-username="JellyBool" data-userid="7" data-comment-type="lesson" data-url="/commentreversion/{{$comment->archive->id}}"> 回复</a> <a class="hide">隐藏</a> <a class="save">分享</a>
                            </div>
                            <div class="reply-form-container">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @endforeach
        </ul>
    </div>
</div>
    @endif
<script>
    $(function () {
        $("#commentcontent").click(function () {
            var authcheck="{{Auth::check()}}";
            if(authcheck.length<1){
                $("#commentuser").show();
                $(".login_popup").show();
            }else {
                $("#commentuser").hide();
                $(".login_popup").hide();
            }
        })
    });
</script>