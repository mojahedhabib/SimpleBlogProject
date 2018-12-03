@extends('main')

@section('title', '| Blog')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Blogs</h1>
                <hr>
                @foreach($posts as $post)
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>{{ $post->title }}</h2>
                            <p><i>Published:</i> {{ date('M j, Y', strtotime($post->created_at)) }}</p>
                            <p>{{ strip_tags(substr($post->body, 0, 250)) }} {{strlen($post->body) > 50 ? '...' : ""}}</p>
                            <a href="{{route('blog.single', [$post->id])}}">  @method('GET') Read more...</a>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <br><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center pagination pagination-sm justify-content-center">
                            {!! $posts->links(); !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

