<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BooksResource extends JsonResource
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
            'title' => $this->title,
            'number_of_pages' => $this->number_of_pages,
            'author' => $this->author->name,
            'rating' => $this->rating,
            'published_date' => $this->published_date,
        ];
    }
}
