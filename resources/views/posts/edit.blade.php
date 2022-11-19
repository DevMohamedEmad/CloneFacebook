@extends('layouts.app')
@section('content')

<div class="container">

  <div class="row">
    <div class="col">
        <div class="jumbotron" style="background-color: #eee; padding:10px;border-radius:10px; margin-bottom:10px;">
            <h1 class="display-4">Update Post </h1>
            <a class="btn btn-primary btn-lg" href="{{route('posts')}}" role="button" style="margin-bottom:10px"><h5> Posts </h5></a>
            <hr class="my-4">
        </div>
    </div>

</div>
<div class="row"  style="padding:10px;">
    <p class="display-4">Post-Title : {{$post->title}} </p>
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
        <form action="{{route('post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="Input1"><h3>  Title</h3></label>
              <input type="text" class="form-control" id="Input1" placeholder="post-Title" name="title" value="{{$post->title}}">
            </div>

            <div class="form-group">
              <label for="Input1"><h3>  Tags </h3></label>
            </div>

            <div class="form-group">
                @foreach ($tags as $tag)
                <input type="checkbox" name="tags[]" value="{{$tag->id}}" id="{{$tag->id}}"
                @foreach ($post->tag as $item )
                @if ($item->id ==  $tag->id)
                checked
                @endif
                @endforeach
                >
                <label for="{{$tag->id}}"> {{$tag->tag}}</label>
                @endforeach
            </div>

            <div class="form-group">
                <label for="Textarea1"><h3> Content </h3></label>
                <textarea class="form-control" id="Textarea1" rows="3" name="content"> {{$post->content}} </textarea>
            </div>

            <div class="form-group">
                <label for="input2"><h3> Photo </h3></label>
                <input type="file" class="form-control" id="input2" placeholder="photo" name="photo">
            </div>

            <div class="form-group"style="margin-top:10px">
                <button type="submit" class="btn btn-secondary"> Update </button>

            </div>
          </form>
    </div>
  </div>

</div>

@endsection
