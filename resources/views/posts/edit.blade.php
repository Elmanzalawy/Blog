@extends('layout.app')



@section('title') Edit @endsection



@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form method="POST" action="{{route('posts.update', $posts->id)}}">

        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Title</label>
          <input name="title" type="text" value="{{$posts->title}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$posts->description}}</textarea>
          </div>

          <div class="container">
            <p>Post Creator</p>
        <select class="form-select" aria-label="Default select example">
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>


        <button type="submit" class="btn btn-primary">Update</button
      </form>

@endsection
