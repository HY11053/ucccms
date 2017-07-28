@if(count($comments)>0)
    <div class="brand_tit"><h3 class="tit">内容评论</h3></div>
    <div class="brand_cont">
        @foreach($comments as $comment)
            <div class="comment " id="reply-{{$comment->id}}">
                <a class="avatar avatar-large">
                    <img class="b-lazy b-loaded" src="/AdminLTE/dist/img/avatar2.png">
                </a>
                <div class="content">
                    <span>{{$comment->user->name}}
                    </span>
                    <div class="metadata">
                        <span class="date">{{$comment->updated_at}}</span>
                    </div>
                    <div class="text Post-body">
                        <p>{{$comment->content}}</p>
                    </div>
                    <div class="reply-form-container"></div>
                </div>
            </div>
        @endforeach
        @foreach($comment->reversion as $reversion)
            <div class="comments" style="margin-top:-2.5em;">
                <div class="comment ">
                    <a class="avatar">  <img src="/AdminLTE/dist/img/avatar3.png"></a>
                    <div class="content">
                        <a class="author">{{$reversion->user->name}}</a>
                        <div class="metadata">
                            <span class="date">{{$reversion->updated_at}}</span> </div>
                        <div class="text Post-body" id="Comment__Post_content">
                            <p>{{$reversion->content}}</p>
                        </div>
                        <div class="reply-form-container">
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
@endif