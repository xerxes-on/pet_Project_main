<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'date_of_birth' => $this->date_of_birth,
            'description' => $this->about_author,
            'date_died' => $this->date_died,
            'author_picture' => $this->author_picture,
            'written_books' => BooksResource::collection($this->books),
            'quotes' => QuotesResource::collection($this->quotes),
            ];

    }
}
