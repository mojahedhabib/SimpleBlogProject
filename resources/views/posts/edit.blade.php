@extends('main')

@section('title', '|Edit Post')

@section('stylesheets')
    <link rel="stylesheet" href="{{url("css/select2.min.css")}}">
@endsection

@section('content')
    <div class="row" style="margin-top: 10px;">
        <div class="col col-md-8">
            <form action="{{route('post.update', array($post->id))}}" method="post">
                @method('PUT')
                @csrf
                <h1>Edit Post</h1>
                <hr>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" value="{{$post->title}}">
                <br>
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{$post->slug}}">
                <br>
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id" >
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if ($category->id === $post->category_id) selected="'selected"
                                @endif>
                            {{$category->name}}</option>
                    @endforeach
                </select> <br>

                <label for="tags" >Tags</label>
                <select class="form-control select2-selection--multiple" multiple="multiple" name="tags[]" id="tags" >
                    @foreach($tags as $tag)
                       @if (in_array($tag->id, $tagids))
                            <option value="{{$tag->id}}" selected="true"> {{$tag->name}}</option>
                        @else
                            <option value="{{$tag->id}}"> {{$tag->name}}</option>
                        @endif
                    @endforeach
                </select> <br> <br>

                <label for="body">Post Body</label>
                <textarea name="body" id="body" cols="30" rows="10" class="form-control" >{{$post->body}}</textarea>
               <!-- <input type="submit" value="Save Changes">-->

        </div>

        <div class="col-md-4" style="margin-top: 30px; ">
            <div class="card" style="background-color:#FFF8DC; ">
                <div class="card-body">
                    <div class="col col-md-12" style="margin-top: 10px; ">
                        <div class="row text-justify  justify-content-center">
                            <dt class="card-title">Created At: &nbsp;</dt>
                            <dd  class="card-text"> {{date('M j, Y h:ia', strtotime($post->created_at))}}</dd>
                        </div>
                    </div>

                    <div class="col col-md-12" style="margin-top: 10px;">
                        <div class="row text-justify  justify-content-center" style="position: center;">
                            <dt class="card-title">last Updated: &nbsp;</dt>
                            <dd class="card-text mb-0">{{date('M j, Y h:ia', strtotime($post->updated_at))}}</dd>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                            <div class="col-sm-5 offset-md-1">
                                <form action="">
                                    <input type="submit"  class="btn btn-success btn-block" value="Save">
                                </form>

                            </div>

                            <div class="col-sm-5" style="">
                                <form action="{{route('post.show', array($post->id))}}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <input type="submit" value="Cancel" class="btn btn-block btn-primary">
                                </form>
                            </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{url("js/select2.min.js")}}"></script>
    <script>
        $(".select2-selection--multiple").select2({
            maximumSelectionLength: 10
        });
    </script>
@endsection