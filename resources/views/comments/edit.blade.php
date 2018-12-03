@extends('main')
@section('title', '|Edit Comment')

@section('content')
    <h1>Edit Comment</h1>
    <hr style="margin-bottom: 30px;">

    <form action="{{route('comments.update', $comment->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{$comment->name}}" disabled >
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{$comment->email}}" disabled>
        </div>
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" cols="30" rows="10" class="form-control">{{$comment->comment}}</textarea>
        </div>
        <input type="submit" class="btn btn-success btn-block" style="margin-top: 15px;" value="Save Changes">
    </form>
@endsection    