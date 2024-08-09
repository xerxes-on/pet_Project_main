<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function quotes():HasMany
    {
        return $this->hasMany(Quote::class);
    }
    public function books():HasMany
    {
        return $this->hasMany(Book::class);
    }


}
