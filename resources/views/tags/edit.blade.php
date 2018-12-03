@extends('main')

@section('title', "|Edit Tag")

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Edit Tag</h2>
                <form action="{{route('tags.update', $tags->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="name"></label>
                    <input type="text" class="form-control" name="name" value="{{$tags->name}}">
                    <input type="submit" value="Save Changes" class="btn btn-primary" style="margin-top: 15px;">
                </form>
            </div>
        </div>
    </div>
 @endsection