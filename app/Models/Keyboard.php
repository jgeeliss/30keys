<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'layout',
        'user_id',
    ];

    protected $casts = [
        'layout' => 'array',
    ];

    public function user()
    {
        // relation many-to-one: many keyboards belong to one user
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        // relation one-to-many: one keyboard has many ratings
        return $this->hasMany(Rating::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }

    public function totalRatings()
    {
        return $this->ratings()->count();
    }

    public function comments()
    {
        // relation one-to-many: one keyboard has many comments
        return $this->hasMany(Comment::class);
    }

    public function languageTags()
    {
        // relation many-to-many: keyboards and language tags
        return $this->belongsToMany(LanguageTag::class, 'keyboard_language_tag');
    }
}
