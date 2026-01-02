<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_alias',
        'email',
        'password',
        'birthday',
        'about_me',
        'profile_picture',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'birthday' => 'date',
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Check if user is admin, used in policies
     */
    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function keyboards()
    {
        // relation many-to-one: many keyboards belong to one user
        return $this->hasMany(Keyboard::class);
    }

    public function ratings()
    {
        // relation many-to-one: many ratings belong to one user
        return $this->hasMany(Rating::class);
    }

    public function comments()
    {
        // relation many-to-one: many comments belong to one user
        return $this->hasMany(Comment::class);
    }
}
