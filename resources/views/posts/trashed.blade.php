@extends('layouts.app')
@section('content')

<div class="container">

  <div class="row">
    <div class="col">
        <div class="jumbotron" style="background-color: #eee; padding:10px;border-radius:10px; margin-bottom:10px;">
            <h1 class="display-4">Trashed Posts </h1>
            <a class="btn btn-secondary btn-lg" href="{{route('posts')}}" role="button" style="margin-bottom:10px"><h5> Posts </h5></a>
            <hr class="my-4">
          </div>
    </div>
  </div>

  <div class="row">
    @if ($message = Session::get('success'))
              <div class="alert alert-primary" role="alert">
                      {{$message}}
              </div>
    @endif
    <div class="col">
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
                    <img src="{{URL::asset($post->photo)}}" alt="" class="img-tumbnail" width="100" height="100">
                    {{-- <img src="{{$post->photo}}" alt="" class="img-tumbnail" width="100" height="100"> --}}
                </td>
                <td>
                    <a class="text-danger" href="{{route('post.hdelete',$post->id)}}"><i class="fa fa-2x fa-trash" aria-hidden="true"></i></a>&nbsp;
                    <a href="{{route('post.restore' , ['id' => $post->id])}}"><i class="fa fa-2x  fa-undo" aria-hidden="true"></i> </a>
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        @else
        <div class="alert alert-dark" role="alert">
            <h5>No Posts Trashed Yet</h5>
        </div>
        @endif

    </div>
  </div>

</div>

@endsection
