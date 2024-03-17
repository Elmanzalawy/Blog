@extends('layout.app')

@section('title') Show @endsection

@section('content')


      <div class="card">
        <h5 class="card-header">{{$posts->title}}</h5>
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">{{$posts->description}}</p>
        </div>
      </div>

    <div class="card mt-4">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{$posts->user->name}}</h5>
            <p class="card-text">Email: {{$posts->user->email}}</p>
            <p class="card-text">Id: {{$posts->user->id}}</p>

        </div>
    </div>


    <form action="{{ route("posts.comment.store", ['post' => $posts->id]) }}" method="POST">
        @csrf
        <div class="card mt-5">
            <label for="exampleFormControlTextarea1" class="form-label card-title card-header">Your Comment</label>
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
        </div>
        <div class=" mt-3">
            <button type="submit" class="btn btn-info" style="background-color: gray; color: white; border: gray">Comment</button>
        </div>
    </form>



    {{-- <table>
        <thead>
            <tr>
                <th>Comment</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $comment)
                <tr>
                    <td>{{ $posts->$comment }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}




@endsection



