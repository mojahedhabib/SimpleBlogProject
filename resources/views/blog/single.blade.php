@extends('main')



@section('title', "| @$post->title")

@section('stylesheets')
    <link rel="stylesheet" href="{{url("css/style.css")}}">
    <link rel="stylesheet" href="{{url("css/post.css")}}">
@endsection


@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <img class="author-image mr-3 card-img" src="{{"https://www.gravatar.com/avatar/". md5(strtolower(trim(Auth::user()->email)))}}" alt="Generic placeholder image"style="margin-left: 20px;">
                            <h6><i>Mojahed Habib</i></h6>
                        </div>
                        <div class="row">
                            <i style="color:#cccccc; margin-left: 20px; margin-top: 5px;"><small><strong class="fas fa-clock"> Published at {{date('M j, Y h:ia', strtotime($post['created_at']))}}</strong></small></i><br><br>
                        </div>
                    <h1 class="card-title">{{$post['title']}}</h1>
                     <div class="image">
                         <img src="{{asset('images/'. $post->image)}}" alt="post-image">
                     </div>
                    <p>{!! $post['body'] !!}}</p>
                    <hr>
                    <p>Posted In: {{$post->category['name']}}</p>
                        &nbsp;<h6 class="fas fa-tag"> Tags:</h6>
                        @foreach($post->tags as $tag)
                            <span class="badge badge-secondary">{{$tag->name}}</span>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
<!--displaying comments-->
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
                            <button class="btn-success btn-sm"><span class="fas fa-reply"> Reply</span></button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--add comment-->
    <div class="row">
        <div id="comment-form" class="col-md-8 offset-md-2 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('comments.store', $post->id)}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="email address">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" placeholder="Write your comments here..."></textarea>

                                    <input type="submit" class="btn btn-primary" value="Add Comment" style="margin-top: 10px;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

