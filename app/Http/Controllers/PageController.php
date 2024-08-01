<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psy\Util\Json;

class PageController extends Controller
{

    public function catalog():View
    {
        $books =Book::with('author')->paginate(15);
        return view('layouts.search', ['books'=>$books]);
    }

   public function search(Request $request)
   {
    $keyword = $request->keyword;
    $books = Book::where('title', 'LIKE', "%{$keyword}%")
                 ->paginate(10);

    return response()->json(['books' => $books]);
   }
}
