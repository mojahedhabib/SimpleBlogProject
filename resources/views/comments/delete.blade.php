@extends('main')

@section('title', "| Deleting Comment")

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Delete this comment?</h3>
            <hr>
            <p>
                <strong>{{$comment->name}}</strong><br><br>
                <strong>{{$comment->email}}</strong><br><br>
                <strong>{{$comment->comment}}</strong><br><br>
            </p>
            <form class="delete" action="{{route('comments.destroy', $comment->id)}}" method="POST" a>
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger btn-block" value="Delete Comment">
            </form>
        </div>
    </div>
@endsection

<script>
    $("delete").on("submit", function() {
        return confirm("Do you want to delete this item?");
    });
</script>