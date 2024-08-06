<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\AuthorsResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $authors = Author::with('books')->paginate(10);
         return response(AuthorsResource::collection($authors));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $author = Author::with('books')->find($id);
            if ($author) {
            return response(new AuthorsResource($author));
        } else {
            return response('There is no hotel with such id', 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
