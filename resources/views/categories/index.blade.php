@extends('base.post_base')
@section('css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

@endsection

@section('title')
<h1>
    Categories
</h1>
@endsection

@section('breadcrumb')
    <li class="active">Categories</li>
@endsection


@section('action-content')
    |@include('partials._messages')
    <section class="content">
        <div class="row">
            <div class="col-md-8 mt-5 col-md-offset-2">
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col col-md-2">
                                <h1 class="card-title">Categories</h1>
                            </div>
                            <div class="col col-md-2" style="margin-top: 20px;">
                                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#addModal"><span class="fas fa-plus"> Add New Category</span></button>
                            </div>
                        </div>

                        <table class="table table-hover" style="margin-top: 35px;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th>{{$category->id}}</th>
                                    <td>{{$category->name}}</td>
                                    <div class="row">
                                        <td>
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal" data-id="{{$category->id}}" data-name ="{{$category->name}}">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" data-id="{{$category->id}}">delete</button>
                                        </td>
                                    </div>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="myModal">
                    <form action="{{route('categories.update', 'category')}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="hidden" name="id" value="" id="category_id">
                            <label for="category_name">Category</label>
                            <input id="category_name" type="text" class="form-control" value="" name="name">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!---Add Modal->
    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('categories.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category" id="category">Category Name</label>
                            <input type="text" class="form-control" name="name" id="category">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal modal-danger" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Are you sure you want to delete this?</p>
                    <form action="{{route('categories.destroy', 'delete')}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="" id="_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No, Close</button>
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
 @endsection







