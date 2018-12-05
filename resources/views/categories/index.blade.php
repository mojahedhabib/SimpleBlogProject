@extends('pages.dashboard')

@section('the-content')
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
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
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-5" style="margin-top: 35px;">
            <div class="card">
                <div class="card-body">
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



 @endsection







