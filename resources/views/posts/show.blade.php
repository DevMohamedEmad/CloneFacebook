@extends('layouts.app')
@section('content')

<div class="container">

  <div class="row">
    <div class="col">
        <div class="jumbotron" style="background-color: #eee; padding:10px;border-radius:10px; margin-bottom:10px;">
            <h1 class="display-4">Show Post </h1>
            <a class="btn btn-primary btn-lg" href="{{route('posts')}}" role="button" style="margin-bottom:10px"><h5>Posts </h5></a>
            <hr class="my-4">
        </div>
    </div>
</div>
<div class="row"  style="padding:10px;">
    <div class="col" style="height: 18rem;">
        <p class="display-4">Post-Title : {{$post->title}} </p>
        <div class="card" style="width: 30rem;">
            <img src="{{URL::asset($post->photo)}}" class="card-img-top" alt="...">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{$post->content}}</li>
            </ul>

            <ul class="list-group list-group-flush">
                @foreach ($tags as $tag)
                    @foreach ($post->tag as $item)
                        @if ($tag->id == $item->id)
                          <li class="list-group-item">{{$tag->tag}}</li>
                        @endif
                    @endforeach
                @endforeach
              </ul>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"> Created-at :{{$post->created_at->diffForhumans()}}</li>
              <li class="list-group-item"> Updated-at :{{$post->updated_at->diffForhumans()}}</li>
            </ul>


            <div class="card-body">
                <a href="#" class="card-link"><i class="fa fa-2x fa-thumbs-up" aria-hidden="true"></i></a>
                <a href="#" class="card-link"><i class="fa fa-2x fa-thumbs-down" aria-hidden="true"></i></a>
            </div>
          </div>
    </div>
  </div>

</div>

@endsection
