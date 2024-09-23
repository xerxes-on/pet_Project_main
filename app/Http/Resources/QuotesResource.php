<?php

namespace App\Http\Resources;

use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuotesResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $isFollowed = auth()->check() && auth()->user()
                ->followingAuthors()
                ->where('author_id', $this->author->id)
                ->exists();
        return [
            'id' => $this->id,
            'quote' => $this->quote,
            'author' => [
                'data' => $this->author,
                'books_count' => Author::find($this->author->id)->books()->count(),
                'followers_count' => $this->author->followers->count(),
                'isFollowed' => $isFollowed
            ],
            'likes' => count($this->users),
            'categories' => $this->categories,
            'created_at' => $this->created_at,
            'is_liked'=> User::find(auth()->user()->id)
                ->likedQuotes()->where('quote_id', $this->id)
                ->exists()
        ];
    }
}
