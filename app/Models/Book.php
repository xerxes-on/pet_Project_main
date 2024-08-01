<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function author():BelongsTo
    {
        return $this->belongsTo(Author::class );
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
