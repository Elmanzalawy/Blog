<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\ReviewRating;
use App\Models\Post;

class ReviewRatingController extends Controller
{
    public function reviewstore(Request $request, POST $posts)
    {
        $review = new ReviewRating();
        $review->comments = $request->comment;
        $review->star_rating = $request->rating;
        // $posts = Post::find($posts->id);
        $review->user_id = Auth::user()->id;
        $review->save();

        return redirect()->back()->with('success', 'Comment created successfully');
    }




}
