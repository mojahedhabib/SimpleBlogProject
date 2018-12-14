@extends('base.post_base')

@section('title')
    <h1>Edit Post</h1>
@endsection

@section('breadcrumb')
    <li class="active">Posts / Edit Post</li>
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="{{url("css/parsley.css")}}">
    <link rel="stylesheet" href="{{url("css/select2.min.css")}}">

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link',
            menubar: false
        });
    </script>
@endsection

@section('action-content')
    <section class="content">
        <div class="row" style="margin-top: 10px;">
            <div class="col col-md-12">
                <div class="box">
                    <div class="box-body">
                        <form action="{{route('post.update', array($post->id))}}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col col-md-4" style="margin-top: 30px;"><h6>Published at: <strong>{{date('M j, Y h:ia', strtotime($post->created_at))}}</strong></h6></div>
                                <div class="col col-md-4" style="margin-top: 30px;"><h6>Last Updated: <strong>{{date('M j, Y h:ia', strtotime($post->updated_at))}}</strong></h6></div>
                            </div>

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
                            <input type="submit"  class="btn btn-success" value="Save" style="margin-top: 5px;">
                            <input type="submit" value="Cancel" class="btn btn-primary" style="margin-top: 5px;">


                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{url("js/select2.min.js")}}"></script>
    <script src="{{url("js/select2.min.js")}}"></script>
    <script src="{{url("js/select2.min.js")}}"></script>

    <script>
        $(".select2-selection--multiple").select2({
            maximumSelectionLength: 10
        });
    </script>
@endsection