@extends('main')

@section('title', '| Homepage')
@section('stylesheets')
    <link rel="stylesheet" href="css/style.css">
    <style>
        .jumbotron {
            background-image: url('images/jumbotron.jpg');
            background-repeat: no-repeat;
            background-size: cover; height: 100%;
            width: 100%;
            background-size: 100% 100%;
            background-position: center center;
        }
    </style>
@endsection

@section('banner')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"style="color: yellowgreen; font-size: 75px; text-decoration-color: darkblue;"><strong>Welcome to my blog!</strong></h1>
            <h2 class="lead" style="color:white;"><strong>This is my sample laravel testing blog, please see my post everytime...</strong></h2>
            <hr class="my-4">
            <a class="btn btn-primary btn-lg border-white" href="#" role="button">See popular posts...</a>
        </div>
    </div>
@endsection



@section('content')
        <div class="row float-lg-none mt-5">
                <div class="col col-md-8">
                    <h3 class="text-center">Hot Topics</h3>
                    @foreach($posts as $post)

                        <div class="card mb-3">
                            <img class="card-img-top" src="{{asset('images/' . $post->image)}}" width="100px" height="300px" alt="images/jumbotron.jpg">
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{strip_tags(substr($post->body, 0, 200))}} {{strip_tags(strlen($post->body) > 300 ? "..." : "")}}</p>
                                <a href="{{route('blog.single', $post->id)}}" class="btn btn-primary mb-3">Read more...</a>
                                @if(Auth::check())
                                    <div class="author-info">
                                        <img src="{{"https://www.gravatar.com/avatar/". md5(strtolower(trim(Auth::user()->email)))}}" class="author-image">
                                        <div class="author-name">
                                            <h5> {{Auth::user()->name}}</h5>
                                            <p class="author-time mb-0"> {{date('M j, Y h:ia', strtotime($post->created_at))}}</p>
                                        </div>
                                    </div>


                                    @else
                                    <i style="
                                         font-size: 15px;
                                         font-style: italic;
                                         color: #aaa;">
                                        <small>
                                            <strong>Published at {{date('M j, Y h:ia', strtotime($post->created_at))}}</strong>
                                        </small></i><br><br>
                                @endif
                                <div class="row float-right" style="margin-top: 40px; margin-right: 75px;">
                                    <p class="fas fa-tags"> Tags:</p>
                                    @foreach($post->tags as $tag)
                                        <span class="badge badge-secondary">{{$tag->name}}</span>
                                    @endforeach
                                </div>
                                <div class="row float-right mb-0">
                                    <div class="viewers">
                                        <span class="badge badge-info"><i class="fas fa-eye border-secondary mr-2"> 1032 views</i></span>
                                        <span class="badge badge-info"><i class="far fa-thumbs-up border-secondary mr-2"> 4 likes</i></span>
                                        <span class="badge badge-info">
                                            <i class="far fa-comments border-secondary mr-2">
                                                {{$post->comments->count()}}
                                            </i></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @endforeach
                </div><hr>

                <div class="col-md-4">
                    <h3 class="text-center mt-5">LATEST POSTS</h3>
                    <div class="card  ">
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($posts as $post)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="post-title">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                        </div>
                                        <span class="badge badge-primary badge-pill">14 views</span>
                                        <span class="badge badge-primary badge-pill">14 likes</span>
                                        <span class="badge badge-primary badge-pill">
                                            @if($post->comments->count() != 0)
                                                @if($post->comments->count() == 1)
                                                    {{ $post->comments->count()}} comment</span>
                                                @else
                                                    {{ $post->comments->count()}} comments</span>
                                                @endif
                                             @else
                                                 <span class="badge badge-primary badge-pill">0 comment</span>
                                              @endif
                                    </li>
                               @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="list-group">
                                <h3 class="text-center">CATEGORIES</h3>
                                @foreach($categories as $category)
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="category-title">
                                            <h5 class="card-title"> {{ $category->name }} </h5>
                                        </div>
                                        <span class="badge badge-primary badge-pill">{{ $category->posts->count() }}</span>
                                    </li>
                                </ul>
                                @endforeach
                            </div>
                            <h3 class="text-center">TAGS</h3>
                                @foreach($tags as $tag)
                                    @if($post->tags->count() != 0)
                                        <span class="badge badge-secondary">{{ $tag->name }} <span class="badge badge-pill badge-primary"> {{ $tag->posts()->count() }} </span></span>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                </div>
       <!--end of .container-->
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center pagination justify-content-lg-center">
                        {!! $posts->links(); !!}
                    </div>
                </div>
            </div>
    </div>
@endsection