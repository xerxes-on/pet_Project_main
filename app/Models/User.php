<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Althinect\FilamentSpatieRolesPermissions\Concerns\HasSuperAdmin;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function reviews()
    {
        return $this->hasMany(Rating::class);
    }

    public function likedquotes()
    {
        return $this->belongsToMany(Quote::class, 'user_quotes');
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
    public function getJWTCustomClaims()
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
