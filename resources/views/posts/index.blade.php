@extends('layouts.app')
@section('content')

<div class="container">

  <div class="row">
    <div class="col">
        <div class="jumbotron" style="background-color: #eee; padding:10px;border-radius:10px; margin-bottom:10px;">
            <h1 class="display-4">All Posts </h1>
            <a class="btn btn-secondary btn-lg" href="{{route('post.create')}}" role="button" style="margin-bottom:10px"><h5> Create Post </h5></a>
            <a class="btn btn-dark btn-lg" href="{{route('posts.trashed')}}" role="button" style="margin-bottom:10px"><h5> Trashed Posts <i class="fa fa-trash" aria-hidden="true"></i></h5></a>
            <hr class="my-4">
          </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
        @if ($message = Session::get('success'))
        <div class="alert alert-primary" role="alert">
                {{$message}}
        </div>
@endif
        @if ($posts->count()>0)
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Title</th>
                <th scope="col">Photo</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @php
                 $i=0;
                @endphp
                @foreach ($posts as $post )
              <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$post->user->name}}</td>
                <td>{{$post->title}}</td>
                <td>
                    {{-- <img src="{{URL::asset($post->photo)}}" alt="" class="img-tumbnail" width="100" height="100"> --}}
                    <img src="{{$post->photo}}" alt="" class="img-tumbnail" width="100" height="100" style="border-radius: 50%">
                </td>
                <td>
                    <a href="{{route('post.show' , ['slug' => $post->slug])}}"><i class="fa fa-2x fa-eye" aria-hidden="true"></i> </a>
                    @if ($post->user_id == Auth::id())
                    &nbsp;
                    <a class="text-dark"  href="{{route('post.edit' , ['id' => $post->id])}}"><i class="fas fa-2x  fa-edit"></i></a> &nbsp;
                    <a class="text-danger" href="{{route('post.destroy',['id'=>$post->id])}}"><i class="fa fa-2x fa-trash" aria-hidden="true"></i></a>&nbsp;
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        @else
        <div class="alert alert-dark" role="alert">
            <h5>No Posts Yet</h5>
        </div>
        @endif

    </div>
  </div>

</div>

@endsection
