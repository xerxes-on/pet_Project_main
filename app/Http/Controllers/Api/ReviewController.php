<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewsResource;
use App\Models\Rating;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Rating::where('id', '=', auth()->user()->id)->get();
        if ($reviews) {
            return response(ReviewsResource::collection($reviews));
        } else {
            return response('No reviews', 404);
        }
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'rating' => 'min:1|max:10|required',
                'comment' => 'required| min:10',
            ]
        );
        $inserting = $request->all();
        $inserting['user_id'] = auth()->user()->id;

        Rating::create($inserting);
        return response()->json([
            'message' => 'Created Successfully 🙂',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review = Rating::with('user')->find($id);
        if ($review) {
            return response(new ReviewsResource($review));
        } else {
            return response('There is no hotel with such id');
        }
    }

    public function update(Request $request, string $id)
    {

        $review = Rating::with('user')->find($id);
        $request->validate(
            [
                'rating' => 'min:1|max:10|required',
                'comment' => 'required| min:10',
            ]
        );
        if (!$review->user->id == auth()->user()->id) {
            return response('Unauthorized');
        }

        $inserting = $request->all();
        $inserting['user_id'] = auth()->user()->id;

        $review->update($inserting);

        return response()->json([
            'message' => 'Updated Successfully',
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Rating::find($id);
        if ($review->user->id == auth()->user()->id) {
            if ($review) {
                $review->delete();
            } else {
                return response('Not found');
            }
        } else {
            return response('Unauthorized');
        }


    }
}
