<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Review;

/**
 * Class ReviewController
 * @package App\Http\Controllers
 */
class ReviewController extends Controller
{
    /**
     * @param StoreReviewRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(StoreReviewRequest $request)
    {
        $review = new Review();
        $filename = $request->filename->getClientOriginalName();
        $request->filename->storeAs('public/upload', $filename);
        $review->name = $request->name;
        $review->email = $request->email;
        $review->rating = $request->rating;
        $review->review_text = $request->review_text;
        $review->filename = $filename;
        $review->save();
        return view('review');
    }
}
