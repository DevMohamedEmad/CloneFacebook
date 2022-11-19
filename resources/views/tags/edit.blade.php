@extends('layouts.app')
@section('content')

<div class="container">

  <div class="row">
    <div class="col">
        <div class="jumbotron" style="background-color: #eee; padding:10px;border-radius:10px; margin-bottom:10px;">
            <h1 class="display-4">Update Tag </h1>
            <a class="btn btn-primary btn-lg" href="{{route('tags')}}" role="button" style="margin-bottom:10px"><h5> Tags </h5></a>
            <hr class="my-4">
        </div>
    </div>

</div>
<div class="row"  style="padding:10px;">
    <p class="display-4">Tag-Name : {{$tag->tag}} </p>

    @if(count($errors) > 0)
    @foreach ($errors->all() as $item)
    <div class="alert alert-primary" role="alert">
        {{$item}}
    </div>
    @endforeach
    @endif

    @if ($message = Session::get('success'))
              <div class="alert alert-primary" role="alert">
                      {{$message}}
              </div>
    @endif
    <div class="col">
        <form action="{{route('tag.update',$tag->id)}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="Input1"><h3>  Tag </h3></label>
              <input type="text" class="form-control" id="Input1" placeholder="post-Title" name="tag" value="{{$tag->tag}}">
            </div>

            <div class="form-group"style="margin-top:10px">
                <button type="submit" class="btn btn-secondary"> Update </button>
            </div>
          </form>
    </div>
  </div>

</div>

@endsection
