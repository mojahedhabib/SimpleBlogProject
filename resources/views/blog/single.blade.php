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
                    <h1 class="card-title">{{$post['title']}}</h1>
                    <div class="row">
                        <i style="color: #1E90FF;"><small><strong>Published at {{date('M j, Y h:ia', strtotime($post['created_at']))}}</strong></small></i><br><br>
                        &nbsp;<h6>Tags:</h6>
                            @foreach($post->tags as $tag)
                                <h6><span class="badge badge-secondary">{{$tag->name}}</span></h6>
                            @endforeach
                    </div>
                     <div class="image">
                         <img src="{{asset('images/'. $post->image)}}" alt="post-image">
                     </div>
                    <p>{!! $post['body'] !!}}</p>
                    <hr>
                    <p>Posted In: {{$post->category['name']}}</p>
                </div>
            </div>
        </div>
    </div>

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

    <div class="row">
        <div id="comment-form" class="offset-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('comments.store', $post->id)}}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="comment">Comment</label>
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

