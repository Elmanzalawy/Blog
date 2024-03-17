<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /// Index
    public function index()
    {
        $postsFromDB = Post::all();
        return view('posts.index', ['posts' => $postsFromDB]);
    }

    public function dashboard()
    {
        $postsFromDB = Post::all();
        return view('dashboard', ['posts' => $postsFromDB]);
    }

    public function guest()
    {
        $postsFromDB = Post::all();
        return view('guest', ['posts' => $postsFromDB]);
    }

    /// Show
        public function show($PostId)
        {
            $singlePostFromDB = Post::findOrFail($PostId);
            return view('posts.show', ['posts' => $singlePostFromDB ]);
        }

    /// Create
        public function create()
        {
            $users = User::all();

            return view('posts.create', ['users'=> $users ]);
    }



        public function store(Request $request){
            $user=auth()->user();

            $userid=$user->id;

            $username=$user->name;

            $email=$user->email;

            $post = new Post;

            $post->title = $request->title;

            $post->description = $request->description;

            $post->user_id =$userid;

            $post->name =$username;

            $post->email =$email;

            $post->save();

            return to_route('posts.index');
        }

    /// Edit
        public function edit(Post $posts)
        {
            $users = User::all();

        return view('posts.edit', ['users'=> $users, 'posts'=> $posts]);
        }

    /// Update
        public function update(Request $request, Post $post)
        {
            $user=auth()->user();
            $userid=$user->id;
            $username=$user->name;
            $email=$user->email;
            $post = new Post;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->user_id =$userid;
            $post->name =$username;
            $post->email =$email;

            $post->save();

        return to_route('posts.show', $post->id);
        }

    /// Delete
        public function destroy($PostId)
        {

            $posts = Post::find($PostId);
            $posts->delete();

            return to_route('posts.index');
            // print('Are you sure you want to delete')
        }


}
