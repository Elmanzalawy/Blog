

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
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>

        @foreach ($posts as $post)


      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->created_at}}</td>


        <td>
            <a href="{{route('posts.show', $post->id)}}" type="button" class="btn btn-info">View</a>

            @if (auth()->id() == $post->user_id)
            <a href="{{route('posts.edit', $post->id)}}" type="button" class="btn btn-primary">Edit</a>
            <form style="display: inline" method="POST" action="{{route('posts.destroy', $post->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endif
        </td>

    </tr>
    @endforeach

</tbody>
</table>
</div>
</div>
</div>
<div>
    {{ $posts->links() }}
</div>

@endsection




