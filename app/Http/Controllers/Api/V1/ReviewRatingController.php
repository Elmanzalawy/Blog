<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ReviewRating;

class ReviewRatingController extends Controller
{
    public function reviewstore(Request $request)
    {
        $review = new ReviewRating();
        $review->comments = $request->comment;
        $review->star_rating = $request->rating;
        // $review->user_id = Auth::user()->id;
        $review->save();

        return redirect()->back()->with('success', 'Comment created successfully');
    }
}
