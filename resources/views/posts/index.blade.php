@extends('base.post_base')

@section('action-content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="col-md-2">
                        <h1 class="card-title">All Posts</h1>
                    </div>
                    <div class="col-md-5 align-self-end">
                        <h1 class="card-title">Search...</h1>
                    </div>
                    <div class="col-md-5 float-right ml-5" style="margin-top: 20px;">
                        <a href="{{route('post.create')}}" class="btn btn-primary float-right mt-1  btn-raised" >+ New Post</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($posts as $post)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$post->title}}</td>
                                <td>{{strip_tags(substr($post->body, 0, 50))}}{{strip_tags(strlen($post->body) > 50 ? "...": "") }}</td>
                                <td>{{date('M d, Y', strtotime($post->created_at))}}</td>
                                <div class="row">
                                    <td>
                                        <a href="{{route('post.show', $post->id)}}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{route('post.edit', $post->id)}}"class="btn btn-success btn-sm">Edit</a>
                                    </td>
                                </div>

                            </tr>
                            @endforeach
                        </tbody></table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {!! $posts->links(); !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop