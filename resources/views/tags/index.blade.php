@extends('pages.dashboard')

@section('the-content')
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Tags</h1>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <th>{{$tag->id}}</th>
                                    <td><a href="{{route('tags.show', $tag->id)}}" style="color: black; text-decoration: none;">{{$tag->name}}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-3 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('tags.store')}}" method="POST">
                        @csrf
                        <h2 class="card-title">New Tag</h2>
                        <input type="text" class="form-control" name="name" placeholder="Add New Tag">
                        <input type="submit" class="btn btn-success btn-h1-spacing btn-block" value="Submit ">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection







