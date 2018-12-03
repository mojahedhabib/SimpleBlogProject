@extends('main')

@section('title', '| View Post')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1> {{$post['title']}}</h1> <br>
        <p class="lead text-justify">{!! $post['body'] !!}</p>
        <hr>
        <i class="fas fa-tags">Tags</i>
            @foreach($post->tags as $tag)
                <span class="badge badge-secondary">{{$tag->name}}</span>
             @endforeach
    </div>

    <div id="backend-comments" style="marin-top: 50px;">
        <h3 style="margin-top: 10px;"><i class="fas fa-comment-dots">Comments</i><small><span class="badge badge-info">{{$post->comments()->count()}}  total</span></small></h3>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Comment</th>
                    <th width="70px"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($post->comments as $comment)
                    <tr>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>
                            <a href="{{route('comments.edit', [$comment->id, 'edit'])}}" class="btn btn-sm btn-primary"><span class="far fa-edit"></span></a>
                            <a href="{{route('comments.delete', [$comment->id, 'delete'])}}" class="btn btn-sm btn-danger"><span class="far fa-trash-alt"></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <div class="col-md-4">
        <div class="card text-justify">
            <div class="card-body">

                <div class="col col-md-12">
                    <div class="row offset-md-1">
                        <dt class="card-title">URL: &nbsp;</dt>
                        <dd  class="card-text"> <a href="{{route('blog.single', array($post->id))}}">{{url($post->id)}}</a></dd>
                    </div>
                </div>

                <div class="col col-md-12">
                    <div class="row offset-md-1">
                        <dt class="card-title">Category: &nbsp;</dt>
                        <dd  class="card-text"> {{$post->category->name}}</dd>
                    </div>
                </div>

                <div class="col col-md-12">
                    <div class="row offset-md-1">
                        <dt class="card-title">Created At: &nbsp;</dt>
                        <dd  class="card-text"> {{date('M j, Y h:ia', strtotime($post['created_at']))}}</dd>
                    </div>
                </div>

                <div class="col col-md-12">
                     <div class="row offset-md-1">
                        <dt class="card-title">last Updated: &nbsp;</dt>
                        <dd class="card-text mb-0">{{date('M j, Y h:ia', strtotime($post['updated_at']))}}</dd>
                     </div>
                </div>
                <hr>
                <div class="col col-md-12 text-center">
                    <div class="row">
                        <div class="col-md-6" style="margin:0px; background-position: center center">
                            <form action="{{route('post.edit', [$post->id, 'edit'])}}" method="POST">
                                @csrf
                                @method('GET')
                                <input type="submit" class=" btn btn-block btn-primary" value="Edit">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('post.destroy', [$post->id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="Delete" class="btn btn-danger btn-block" style="background-position: center">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col col-md-12" style="margin-top: 5px; margin-bottom: 5px;">
                    <a href="{{route('post.index', [])}}" methods="GET"> <button class=" btn  btn-primary btn-block"><< See All Posts</button> </a>
                </div>
            </div>
        </div> <!--end of col-md-4-->
    </div>
</div>
@endsection