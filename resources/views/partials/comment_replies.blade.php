<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
        <div class="card">
            <div class="card-body">
                <h3 class="comments-title"><span class="far fa-comment-dots"></span>{{$post->comments()->count()}}&nbsp;Comments</h3>
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <div class="author-info">
                            <img src="{{"https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email)))}}" class="author-image">
                            <div class="author-name">
                                <h4> {{$comment->name}}</h4>
                                <p class="author-time"> {{date('F nS, Y - G:iA', strtotime($comment->created_at))}}</p>
                            </div>
                        </div>
                        <div class="comment-content">
                            {{$comment->comment}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>