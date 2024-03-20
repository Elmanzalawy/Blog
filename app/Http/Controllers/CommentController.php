<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
        public function storeComment(Request $request, $postId)
    {
        $validatedData = $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment($validatedData);
        $comment->post_id = $postId;
        $comment->save();
        return redirect()->back()->with('success', 'Comment created successfully');
    }
}
