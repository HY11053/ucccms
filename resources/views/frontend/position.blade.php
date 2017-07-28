@inject('positions',App\Position')
{{--$positions->positions(Request::getrequesturi())--}}
<div class="bn1190"><img src="/reception/images/temp/bn{{rand(7,9)}}.jpg" alt=""/></div>
<div class="path">当前位置：<a href="/">首页</a> &gt; <a href="/{{$positions->positions(Request::getrequesturi())->real_path}}/">{{$positions->positions(Request::getrequesturi())->typename}}</a></div>

