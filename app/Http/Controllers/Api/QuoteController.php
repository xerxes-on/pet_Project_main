<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\QuotesResource;
use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $quotes = Quote::with('users', 'author')->paginate(10);
        return response(QuotesResource::collection($quotes));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quote' => 'required|min:10|unique:'.Quote::class,
            'author_id' => 'required',
        ]);
        Quote::create($request->all());
        return response('updated', 204);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quote = Quote::with('users', 'author')->find($id);
        if ($quote) {
            return response(new QuotesResource($quote));
        } else {
            return response('There is no hotel with such id', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $quote = Quote::find($id);
        $request->validate([
            'quote' => 'required|min:10|unique:'.Quote::class,
            'author_id' => 'required',
        ]);
        $updating_quote = $request->all();
        $quote->update([
            'quote' => $updating_quote['quote'],
            'author_id' => $updating_quote['author_id']
        ]);
        return response('updated', 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quote = Quote::find($id);
        if ($quote) {
            $quote->delete();
            return response(204);
        } else {
            return response('No such kind of quote' );
        }

    }
}
