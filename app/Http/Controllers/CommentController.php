<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $comments){
        // dd(request()->content);
        $comments = new Comment();
        $comments->comment = request()->get('comment');
        $comments->save();

return view('posts.show', compact('post', 'comments'));    }

// public function show($postId) {
//     // Fetch the post
//     $post = Post::findOrFail($postId); // Assuming your post model is named Post

//     // Fetch comments related to the post
//     $comments = Comment::where('post_id', $postId)->get(); // Assuming your comment model has a 'post_id' column

//     // Pass the post and comments to the view
//     return view('posts.show', compact('post', 'comments'));
// }

}
