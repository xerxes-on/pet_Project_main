<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\Quote;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $books = Book::where('title', 'LIKE', "%{$keyword}%")
            ->paginate(10);
        $quotes = Quote::where('quote', 'LIKE', "%{$keyword}%")->with('author')
            ->paginate(10);
        $authors = Author::where('name', 'LIKE', "%{$keyword}%")
            ->paginate(10);

        return response()->json([
            'books' => $books,
            'quotes' => $quotes,
            'authors' => $authors
        ]);
    }


}
