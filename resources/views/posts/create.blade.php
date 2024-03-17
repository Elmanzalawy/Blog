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

<form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data" >

    @csrf

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input name="title" type="text" class="form-control" value="{{old('title')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label" >Description</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" {{old('description')}}></textarea>
      </div>




    <button type="submit" class="btn btn-success mt-4">Submit</button
    </form>
@endsection
