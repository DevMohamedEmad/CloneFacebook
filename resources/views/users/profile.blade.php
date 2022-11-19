@extends('layouts.app')

@section('content')
@php
    $genderArray = ['Male' ,'Female'];
@endphp
<div class="container" style="margin-top: 20px">
    @if (count($errors) > 0){
        @foreach ($errors->all() as $item)
        <div class="alert alert-danger" role="alert">
         {{$item}}
          </div>
        @endforeach
    }

    @endif
    <form action= "{{route('profile.update')}}" method="POST">

        <div class="container">
            @if ($message = Session::get('success'))
              <div class="alert alert-primary" role="alert">
                      {{$message}}
              </div>
            @endif
         </div>
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name = 'name' value="{{$user->name}}">
          </div>

        <div class="form-group">
          <label >Bio</label>
          <textarea class="form-control"  rows="2" name = 'bio'>{!!$user->profile->bio!!}</textarea>
        </div>

        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" name = 'address'value="{{$user->profile->address}}">
        </div>

         <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control" name=gender>
            @foreach ($genderArray as $item)
            <option value="{{$item}}"  {{($item == $user->profile->gender)? "selected":""}}>{{$item}} </option>
            @endforeach

          </select>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name = 'password'>
          </div>

          <div class="form-group">
            <label for="c_password">Confirm Password</label>
            <input type="password" class="form-control" id="c_password" name = 'c_password'>
          </div>


          <div class="form-group">
            <button type="submit" class="btn btn-outline-primary" style="margin-top: 10px"> Update</button>
          </div>

      </form>
</div>

@endsection
