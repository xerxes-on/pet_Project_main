<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
