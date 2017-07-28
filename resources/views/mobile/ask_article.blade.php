@extends('mobile.mobile')
@section('main_content')
	<div class="inter">
		<div class="interl">
			<div class="interl1">{{$thisaskinfo->title}}</div>
			<div class="interl2">
				<p>{!! $thisaskinfo->body !!}<br>
				</p>
			</div>
			<div class="interl3"> <i>{{$thisaskinfo->tags}}&nbsp;&nbsp;|&nbsp;&nbsp;浏览  {{$thisaskinfo->viewnum}} 次</i> <span>{{\Carbon\Carbon::parse($thisaskinfo->created_at)->diffForHumans()}}</span> </div>
		</div>
		
		<div class="interlo">
			<div class="interlo_top">
				<div class="interlo_topl">{{count($thisaskanswers)}}个回答</div>
				<div class="interlo_topr"> <i class="ba"><a href="#">默认留言</a></i> <i><a href="#">时间排序</a></i> </div>
			</div>
		</div>

		@foreach($thisaskanswers as $thisaskanswer)
			<div class="interlonr">
				<div class="interlonr_top">
					<div class="interlo_nrl"><a href="#"><img src="/AdminLTE/dist/img/avatar.png" /></a></div>
					<div class="interlo_nrr">
						<ul>
							<li><a href="#">{{$thisaskanswer->user->name}}</a></li>
							<li>1234567890</li>
						</ul>
					</div>
				</div>
				<div class="interlo_con">
					{!! $thisaskanswer->content !!}
				</div>
				<div class="interlo_btm">
					<i>{{$thisaskanswer->user->name}} 回答于{{\Carbon\Carbon::parse($thisaskanswer->created_at)->diffForHumans()}}&nbsp;&nbsp;</i>
				</div>
			</div>
		@endforeach
	</div>
@stop