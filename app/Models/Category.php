<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'category_book');
    }
    public function quotes()
    {
        return $this->belongsToMany(Quote::class, 'category_quote');
    }
}
