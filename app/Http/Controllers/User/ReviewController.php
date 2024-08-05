<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_reviews = auth()->user()->reviews;
        return response()->json([
            'my_reviews' => $my_reviews
    ])   ;
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'rating'=>'min:1|max:10|required',
                'comment'=>'required| min:10',
            ]
        );
        $inserting  = $request->all();
        $inserting['user_id'] = auth()->user()->id;

        $rating = Rating::insert($inserting);
        return response()->json([
            'message'=>'Created Successfully 🙂',
            'review'=> $rating,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rating = Rating::find($id);
        return response()->json([
            'review'=>$rating
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'rating'=>'min:1|max:10|required',
                'comment'=>'required| min:10',
            ]
        );
        $inserting  = $request->all();
        $inserting['user_id'] = auth()->user()->id;

        $request->update($inserting);

        return response()->json([
            'message'=>'Updated Successfully 🙂',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
