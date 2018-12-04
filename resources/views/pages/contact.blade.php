
@extends('main')
@section('title', '| Contact')
@section('content')
    <div class="container"  style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-8 col offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Contact us</h3>
                        <hr>
                        <form action="{{route('contact.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="bmd-label-floating">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="bmd-label-floating">Subject</label>
                                <input type="text" name="subject" class="form-control" id="subject">
                            </div>
                            <div class="form-group">
                                <label for="message" class="bmd-label-floating">Message</label>
                                <textarea name="message" type="text" id="message" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

