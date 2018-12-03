@extends('main')

@section('title', "| $tag->name Tag")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-5">
                <h2>{{$tag->name}} Tag <small><span class="badge badge-pill badge-secondary">{{$tag->posts()->count()}} Post</span></small></h2>
            </div>
            <div class="col-md-2 mt-5">
                <a href="{{route('tags.edit', [$tag->id, 'edit'])}}" class="btn btn-lg btn-block btn-primary float-right" style="margin-top:8px; border: none;">Edit</a>
            </div>
            <div class="col-md-2 mt-5">
                <form action="{{route('tags.destroy', $tag->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-lg btn-block btn-danger float-right" style="margin-top: 8px;" value="Delete">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-table">
                        <table class="table" style="margin-top: 10px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Tags</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tag->posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{$post->title}}</td>
                                        <td>
                                            @foreach($post->tags as $tag)
                                                <span class="badge badge-secondary">{{$tag->name}}</span>
                                            @endforeach
                                        </td>
                                        <td><a href="{{route('post.show', $post->id)}}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection