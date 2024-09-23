<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function books():BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'books_categories');
    }

    public function quotes():BelongsToMany
    {
        return $this->belongsToMany(Quote::class, 'category_quote');
    }
}
