@extends('base.post_base')

@section('title')
    <h1>
        Posts
    </h1>
    @endsection
@section('breadcrumb')
    <li class="active">Posts</li>
@endsection

@section('action-content')

    @include('partials._messages')

   <section class="content">
       <div class="row">
           <div class="col-md-12">
               <div class="box">
                   <div class="box-header with-border">
                       <div class="row">
                           <div class="col col-md-2" style="margin-top: 15px;">
                               <a href="{{route('post.create')}}" class="btn btn-primary btn-lg float-right mt-1  btn-raised" ><span class="fas fa-plus"> New Post</span></a>
                           </div>
                           <!--Search form-->
                           <div class="col col-md-10">
                               <form action="{{route('searchPost')}}" method="POST" role="search">
                                   @method('GET')
                                   @csrf
                                   <div class="input-group input-group-lg pull-right" style="margin-top: 15px; width: 550px; margin-right: 10px;">
                                       <input type="text" class="form-control" placeholder="search..." name="q">
                                       <span class="input-group-btn">
                                  <button type="submit" class="btn btn-primary btn-flat"><span class="fas fa-search"></span></button>
                                    </span>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <table class="table table-bordered">
                           <tbody>
                           <tr>
                               <th>#</th>
                               <th>Title</th>
                               <th>Category</th>
                               <th>Body</th>
                               <th>Tags</th>
                               <th>Created At</th>
                               <th>Action</th>
                           </tr>
                           @foreach ($posts as $post)
                               <tr>
                                   <th>{{$loop->iteration}}</th>
                                   <td>{{$post->title}}</td>
                                   <td>
                                      {{$post->category['name']}}
                                   <td>{{strip_tags(substr($post->body, 0, 50))}}{{strip_tags(strlen($post->body) > 50 ? "...": "") }}</td>
                                   <td>
                                   @foreach($post->tags as $tag)
                                        <span class="badge badge-primary">{{$tag->name}}</span>
                                   @endforeach
                                   </td>
                                   <td>{{date('M d, Y', strtotime($post->created_at))}}</td>
                                   <div class="row">
                                       <td>
                                           <a href="{{route('post.show', $post->id)}}" class="btn btn-info btn-sm">View</a>
                                           <a href="{{route('post.edit', $post->id)}}"class="btn btn-success btn-sm">Edit</a>
                                       </td>
                                   </div>

                               </tr>
                           @endforeach
                           </tbody></table>
                   </div>
                   <!-- /.box-body -->
                   <div class="box-footer text-center">
                       <ul class="pagination pagination-sm no-margin">
                           {!! $posts->links(); !!}
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </section>
@stop