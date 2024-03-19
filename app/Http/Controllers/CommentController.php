<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;


use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $comments = new Comment();
        $comments->comment = $request->get('comments');
        $comments->save();

        return view('posts.show',compact('post , comments'));
    }
}
