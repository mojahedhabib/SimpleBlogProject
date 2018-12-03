@extends('main')

@section('title', '| Register')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3" style="margin-top: 50px; border-color: black;">
            <form  action="{{route('loginRegister.store')}}" method="post">
                {{csrf_field()}}
                @method('POST')

                <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="{{old('name')}}"> <br>

                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" value="{{old('email')}}"><br>

                    <label for="password">Password</label>
                    <input type="password" id="password" class="form-control" name="password" value="{{old('password')}}"><br>

                    <label for="password_confirmation"> Confirmation</label>
                    <input type="password" id="confirmation" class="form-control" name="password_confirmation" ><br>

                    <input type="submit" value="Register" class="form-control btn-primary">
            </form>
        </div>
    </div>
@endsection