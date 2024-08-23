<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
       protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_quote');
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'user_quotes');
    }
}
