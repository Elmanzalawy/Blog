<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Comment $comment){
        // dd(request()->content);
        $comment = new Comment();
        $comment->comment = request()->get('comment');
        $comment->save();

return view('posts.show', compact('comment'));
}


}
