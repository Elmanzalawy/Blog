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

    /// Store
        public function store()
        {

        // request validation
        request()->validate([
            'title' => ['required', 'min:5'],
            'description' => ['required', 'min:10'],
            'posted_by' => ['required', 'exists:users,id'],
        ]);
        // 1- get the user data
            $data = request()->all();
            $title = request()->title;
            $description = request()->description;
            $posted_by = request()->posted_by;
            // dd($title, $description, $posted_by);
        //2- store the user data in database
            Post::create([
                'title'=> $title,
                'description'=> $description,
                'user_id'=> $posted_by,
        ]);
        //3- redirection to posts.index
        return to_route('posts.index');
        }

    /// Edit
        public function edit(Post $posts)
        {
            $users = User::all();

        return view('posts.edit', ['users'=> $users, 'posts'=> $posts]);
        }

    /// Update
        public function update($PostId)
        {
            request()->validate([
                'title' => ['required', 'min:5'],
                'description' => ['required', 'min:10'],
                'posted_by' => ['required', 'exists:users,id'],
            ]);

            $title = request()->title;
            $description = request()->description;
            $posted_by = request()->posted_by;

            $singlePostFromDB = Post::find($PostId);

            $singlePostFromDB->update([
                'title'=> $title,
                'description'=> $description,
                'user_id'=> $posted_by,
            ]);

        return to_route('posts.show', $PostId);
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
