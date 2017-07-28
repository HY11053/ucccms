@extends('mobile.mobile')
@section('main_content')

	<div class="ask">
		<div class="ask_tab">
			<ul>
				<li  @if(Request::getrequesturi()=='/ask/')class="on" @endif ><a href="/ask/">最新问答</a></li>
				<li @if(Request::getrequesturi()=='/ask/hot')class="on" @endif ><a href="/ask/hot">热门问答</a></li>
				<li @if(Request::getrequesturi()=='/ask/pending')class="on" @endif ><a href="/ask/pending">等待回答</a></li>
			</ul>
		</div>
		<div class="ask_list">
			<ul>
				@foreach($asklists as $asklist)
				<li>
					<a href="/ask/{{$asklist->id}}.shtml">
						<div class="answers">{{$asklist->answernum}}<small>回答</small></div>
						<div class="summary">
							<h2 class="title">{{$asklist->title}}</h2>
							<p class="meta"><span class="views">{{$asklist->viewnum}} 浏览</span><span class="votes">{{$asklist->goodpost}} 得票</span><span class="name">{{$asklist->user->name}}</span><span class="time">{{\Carbon\Carbon::parse($asklist->created_at)->diffForHumans()}}</span></p>
						</div>
					</a>
				</li>
					@endforeach
			</ul>
		</div>
		<div class="page">
			{!! preg_replace('/<a href=[\'\"]?([^\'\" ]+).*?>/','<a href="${1}/">',$asklists->links()) !!}
		 </div>
	</div>
	
@stop