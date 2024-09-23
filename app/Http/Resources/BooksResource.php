<?php

namespace App\Http\Resources;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $isFollowed = auth()->check() && auth()->user()->followingAuthors()->where('author_id',
                $this->author->id)->exists();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' => $this->image,
            'number_of_pages' => $this->number_of_pages,
            'description' => $this->description,
            'average_rating' => $this->rating,
            'ratings_count' => count($this->ratings),
            'published_date' => $this->published_date,
            'categories' => $this->categories,
            'created_at' => $this->created_at,
            'readers_stats' => [
                'finished' => Book::find($this->id)->usersWhoFinishedReading(0)->count(),
                'reading' => Book::find($this->id)->usersWhoFinishedReading(1)->count(),
                'want' => Book::find($this->id)->usersWhoFinishedReading(3)->count(),
            ],
            'reviews_count' => Rating::where('book_id', $this->id)
                ->whereNotNull('comment')
                ->count(),
            'author' => [
                'data' => $this->author,
                'books_count' => Author::find($this->author->id)->books()->count(),
                'followers_count' => $this->author->followers->count(),
                'isFollowed' => $isFollowed
            ],
        ];
    }
}
