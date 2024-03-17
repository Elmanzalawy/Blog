@section('title') Dashboard @endsection

@extends('layout.app')


<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
        <a class="font-semibold text-xl text-gray-800 leading-tight" href="{{route('posts.index')}}">
            Codezilla
        </a>
    </x-slot>




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
                <a href="{{route('posts.edit', $posts->id)}}" type="button" class="btn btn-primary">Edit</a>
            </td>

        </tr>
        @endforeach

    </tbody>
</table>
    </div>
</div>
</div>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>






