<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Scout\Searchable;


class Quote extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    public function author():BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_quotes');
    }

    public function categories():BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_quote');
    }

    public function likes():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_quotes');
    }
}
