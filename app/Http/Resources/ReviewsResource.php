<?php

namespace App\Http\Resources;

use Cassandra\Date;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewsResource extends JsonResource
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
            'comment' => $this->comment,
            'rating' => $this->rating,
            'book' => $this->book->title,
            'date' =>  Date('Y-m-d H:i', strtotime($this->created_at))
    ];
    }
}
