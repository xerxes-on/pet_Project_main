<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BooksResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController
{
    public function index()
    {
        $books = Book::with('author')->paginate(10);
        return response(BooksResource::collection($books));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $book = Book::find($id)->with('author');
        return response(BooksResource::collection($book));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
