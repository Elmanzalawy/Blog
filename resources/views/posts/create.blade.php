@extends('layout.app')

@section('title') Create @endsection

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

<!-- Create Post Form -->

<form method="POST" action="{{route('posts.store')}}">

    @csrf

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input name="title" type="text" class="form-control" value="{{old('title')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label" >Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" {{old('description')}}></textarea>
      </div>

      <div class="container">
        <p>Post Creator</p>
    <select name="posted_by" class="form-select" aria-label="Default select example">
        @foreach ($users as $user)
        <option  value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    </div>


    <button type="submit" class="btn btn-success mt-4">Submit</button
    </form>
@endsection
