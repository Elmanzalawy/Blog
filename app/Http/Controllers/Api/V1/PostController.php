<?php

namespace App\Http\Controllers\Api\V1;

// use App\Http\Controllers\Api\V1\ReviewRating;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{

    /// Index
    public function index()
    {



        $posts = Post::paginate(3);
        return view('posts.index', compact('posts'));
    }

    public function dashboard()
    {

        $postsFromDB = Post::where("user_id", auth()->id())->get();
        return view('dashboard', ['posts' => $postsFromDB]);
    }

    public function guest()
    {
        $posts = Post::paginate(3);
        return view('guest', compact('posts'));
    }

    /// Show
        public function show(Post $posts)
        {

            $singlePostFromDB = Post::findOrFail($posts->id);
            return view('posts.show', ['posts' => $singlePostFromDB ]);
        }

    /// Create
        public function create()
        {
            $users = User::all();

            return view('posts.create', ['users'=> $users ]);
    }


        public function store(Request $request, Post $posts){
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


            // return to_route('posts.index',compact('posts'));
            return back()->with('success', 'Post deleted successfully');

        }

    /// Edit
        public function edit(Post $posts)
        {

            if (auth()->id() != $posts->user_id){
                return back()->with('error','Unauthorized action');
            }

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
        public function destroy(Post $posts)
        {
            if (auth()->id() != $posts->user_id){
                return back()->with('error','Unauthorized action');
            }

            $posts = Post::find($posts->id);
            $posts->delete();

            return back()->with('success', 'Post deleted successfully');
            // print('Are you sure you want to delete')
        }





}
