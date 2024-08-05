<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psy\Util\Json;

class PageController extends Controller
{

    public function catalog()
    {
        $books =Book::with('author')->paginate(15);
        return response()->json([
            'books' => $books,
        ]);
    }
        public function quotes()
    {
        $quotes =Quote::with('author')->paginate(15);
        return response()->json([
            'quotes' => $quotes,
        ]);
    }
    public function authors()
    {
        $authors =Author::with('books')->paginate(15);
        return response()->json([
            'authors' => $authors,
        ]);
    }

   public function search(Request $request)
   {
        $keyword = $request->keyword;
        $books = Book::where('title', 'LIKE', "%{$keyword}%")
                     ->paginate(10);

        return response()->json(['books' => $books]);
   }
   public function quote_search(Request $request)
   {
       $keyword = $request->keyword;
        $quotes = Quote::where('quote', 'LIKE', "%{$keyword}%")
                     ->paginate(10);

        return response()->json(['quotes' => $quotes]);
   }
   public function author_search(Request $request)
   {
        $keyword = $request->keyword;
        $quotes = Author::where('name', 'LIKE', "%{$keyword}%")
                    ->with('books')
                     ->paginate(10);

        return response()->json(['quotes' => $quotes]);
   }

}
