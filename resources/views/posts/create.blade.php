@extends('base.post_base')

@section('title')
    <h1>Add New Post</h1>
    @endsection

@section('breadcrumb')
    <li class="active">Posts / Create New Post</li>
@endsection

<!--this is a comment-->
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
    <div class="row">
        <div class="col-md-8 col offset-12" style="margin-left: 250px;">
            <div class="box offset-8">
                <div class="box-body">
                    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="title" class="bmd-label-floating">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{old('title')}}" required><br>

                        <label for="slug">Slug</label>
                        <input type="text" id="slug" name="slug" class="form-control" value="{{old('slug')}}"><br>

                        <label for="category_id">Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select><br>

                        <label for="tags">Tags</label>
                        <select class="form-control select2-selection--multiple" multiple="multiple" name="tags[]" id="tags" >
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select><br> <br>
                        <div class="form-group">
                            <label for="post-image"></label>
                            <input  class="form-control" type="file" name="post-image" id="post-image">
                        </div>

                        <label for="body">Post Body</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{old('body')}}</textarea>
                        <br>
                        <input type="submit" class="btn btn-lg btn-primary" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


    @endsection

@section('script')
    <script src="{{url("js/parsley.min.js")}}"></script>
    <script src="{{url("js/select2.min.js")}}"></script>
    <script src="{{url("js/select2.min.js")}}"></script>

    <script>
        $(".select2-selection--multiple").select2({
            maximumSelectionLength: 10
        });
    </script>
@endsection

