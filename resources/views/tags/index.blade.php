@extends('layouts.app')
@section('content')

<div class="container">

  <div class="row">
    <div class="col">
        <div class="jumbotron" style="background-color: #eee; padding:10px;border-radius:10px; margin-bottom:10px;">
            <h1 class="display-4">All Tags </h1>
            <a class="btn btn-secondary btn-lg" href="{{route('tag.create')}}" role="button" style="margin-bottom:10px"><h5> Create Tag </h5></a>            <hr class="my-4">
          </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
        @if ($tags->count()>0)
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tag</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @php
                 $i=0;
                @endphp
                @foreach ($tags as $tag )
              <tr>
                <th scope="row">{{$i++}}</th>
                <td>{{$tag->tag}}</td>
                <td>
                    <a class="text-dark"  href="{{route('tag.edit' , ['id' => $tag->id])}}"><i class="fas fa-2x  fa-edit"></i></a> &nbsp;
                    <a class="text-danger" href="{{route('tag.destroy',$tag->id)}}"><i class="fa fa-2x fa-trash" aria-hidden="true"></i></a>&nbsp;
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        @else
        <div class="alert alert-dark" role="alert">
            <h5>No Tags Yet</h5>
        </div>
        @endif

    </div>
  </div>

</div>

@endsection
