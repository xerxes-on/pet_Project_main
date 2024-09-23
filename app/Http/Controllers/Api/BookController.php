<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BooksResource;
use App\Models\Book;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class BookController
{
    public function index()
    {
        $books = Book::with('author')->paginate(10);
        return response(BooksResource::collection($books));
    }

    public function show(string $id)
    {
        $book = Book::with('author','categories', 'ratings')->find($id);
        if ($book) {
            return response(new BooksResource($book));
        } else {
            return response('There is no book with such id', 204);
        }
    }

    public function trending_books()
    {
        $topRatedBookIds = Rating::select('book_id')
            ->selectRaw('COUNT(*) as rating_count')
            ->groupBy('book_id')
            ->orderByDesc('rating_count')
            ->limit(6)
            ->pluck('book_id');

        $topBooks = Book::whereIn('id', $topRatedBookIds)->with('author')->get();
        return response()->json($topBooks);
    }

    public function suggestions()
    {
        $suggest = Book::inRandomOrder()->limit(6)->get();
        return response()->json($suggest);
    }
    public function get_reviews($book_id):JsonResponse
    {
        $book = Book::find($book_id);
        $ratings = [];
        $auth_user = User::find(auth()->user()->id);
        foreach ($book->ratings as $rating) {
            $ratings[] = [
                'data' => $rating,
                'user' => $this->get_user_info($rating->user_id),
                'is_liked'=> $auth_user->likedRatings()->where('rating_id', $rating->id)->exists(),
            ];
        }
        return response()->json([
            'reviews' => Rating::where('book_id', $book_id)
                ->whereNotNull('comment')
                ->count(),
            'ratings' => $ratings,
        ]);
    }
    protected function get_user_info($user_id): array
    {
        $user = User::find($user_id);
        return [
            'name' => $user->name,
            'id' => $user->id,
            'reviews' => $user->reviews->count(),
            'followers' => $user->followers->count(),
            'profile_picture' => $user->profile_picture,
            'is_followed' => User::find(1)->following->contains($user->id),
        ];
    }

}
