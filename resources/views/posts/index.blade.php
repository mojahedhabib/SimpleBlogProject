@extends('main')

@section('title', '| All Posts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h1 class="card-title">All Posts</h1>
                            </div>
                            <div class="col">
                                <a href="{{route('post.create')}}" class="btn btn-primary float-right mt-1  btn-raised" >+ New Post</a>
                            </div>
                        </div>

                        <table class="table table-hover">
                            <thead>
                                <th>#</th>
                                <th>id#</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th>{{$loop->iteration}}</th>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>{{strip_tags(substr($post->body, 0, 50))}}{{strip_tags(strlen($post->body) > 50 ? "...": "") }}</td>
                                        <td>{{date('M d, Y', strtotime($post->created_at))}}</td>
                                         <div class="row">
                                                 <td>
                                                     <a href="{{route('post.show', $post->id)}}" class="btn btn-info btn-sm">View</a>
                                                 </td>
                                                 <td>
                                                     <a href="{{route('post.edit', $post->id)}}"class="btn btn-success btn-sm">Edit</a>
                                                 </td>
                                         </div>

                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="pagination pagination-sm justify-content-center mt-1">
                    {!! $posts->links(); !!}
                </div>
            </div>
        </div>
    </div>
@stop