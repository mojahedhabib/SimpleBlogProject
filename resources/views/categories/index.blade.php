@extends('base.post_base')

@section('breadcrumb')
    <li class="active">Categories</li>
@endsection

@section('action-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-5">
                <div class="box">
                    <div class="box-body">
                        <h1 class="card-title">Categories</h1>
                        <table class="table table-hover" style="margin-top: 35px;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th>{{$category->id}}</th>
                                    <td>{{$category->name}}</td>
                                    <div class="row">
                                        <td>
                                            <a href="{{route('categories.edit', $category->id)}}"class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">Edit</a>
                                        </td>
                                    </div>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-5">
                <div class="box">
                    <div class="box-body">
                        <form action="{{route('categories.store')}}" method="POST">
                            @csrf
                            <h2 class="card-title">New Category</h2>
                            <input type="text" class="form-control" name="name" placeholder="Add New Category">
                            <input type="submit" class="btn btn-success btn-h1-spacing btn-block" value="Submit ">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        @csrf
                        @method('GET')
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" value="{{$category->name}}">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
 @endsection







