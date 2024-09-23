<?php

namespace App\Models;

use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject, MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles, HasSuperAdmin, HasPanelShield;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class,'user_books')
            ->withPivot('status');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function likedQuotes(): BelongsToMany
    {
        return $this->belongsToMany(Quote::class, 'user_quotes');
    }
    public function likedGenres(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_user');
    }
    public function following(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id');
    }
    public function followers():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id');
    }
    public function followingAuthors():BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'author_follows', 'user_id', 'author_id');
    }
    public function likedRatings():BelongsToMany
    {
        return $this->belongsToMany(Rating::class, 'likes');
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


}
