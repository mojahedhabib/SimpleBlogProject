@extends('main')

@section('title', '| Login')

@section('content')
    <div class="row">
        <div class="col-md-4 offset-lg-3" style="margin-top: 150px;">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" >Please sign in</h3>
                    <form action="{{route('user.authenticate')}}" method="POST">
                        @csrf
                        @method('post')
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" name="email"><br>

                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" name="password"><br>

                        <input type="checkbox" name="remember"><label for="remember" id="remember">Remember me?</label><br>

                        <input type="submit" value="Login" class="btn btn-primary btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection