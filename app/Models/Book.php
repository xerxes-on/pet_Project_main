<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];
    protected $casts = [
        'images' => 'array',
    ];

    public function users():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'books_categories');
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, 'book_id');
    }

    public function usersWhoFinishedReading($status)
    {
        return $this->belongsToMany(User::class, 'user_books')
            ->wherePivot('status', $status);
    }
//    public function images():
//    {
//        return $this->hasMany(BookImage::class);
//    }
}
