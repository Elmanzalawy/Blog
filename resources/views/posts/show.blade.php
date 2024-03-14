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


@endsection



