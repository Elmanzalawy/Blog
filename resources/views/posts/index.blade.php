

@extends('layout.app')


@section('title') Index @endsection

@section('content')

<div >
    <div class="container">

<div class="text-center mt-3">
    <a href="{{route('posts.create')}}" type="button" class="btn btn-success">Create Post</a>
</div>

<div class="text-center mt-3">
<table class="table mt-3">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Creeated At</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>

        @foreach ($posts as $posts)


      <tr>
        <td>{{$posts->id}}</td>
        <td>{{$posts->title}}</td>
        <td>{{$posts->user->name}}</td>
        <td>{{$posts->created_at}}</td>


        <td>
            <a href="{{route('posts.show', $posts->id)}}" type="button" class="btn btn-info">View</a>
            <a href="{{route('posts.edit', $posts->id)}}" type="button" class="btn btn-primary">Edit</a>

            <form style="display: inline" method="POST" action="{{route('posts.destroy', $posts->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>

      </tr>
      @endforeach

    </tbody>
  </table>
</div>
</div>
</div>

@endsection




