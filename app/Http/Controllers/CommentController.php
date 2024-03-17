<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post){
        // dd(request()->content);
        $comment = new Comment();
        $comment->comment = request()->get('comment');
        $comment->save();

        return redirect()->route('posts.show', $post->id)->with('success', "Comment posted successfully");
    }
}

