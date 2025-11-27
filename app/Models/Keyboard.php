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
        return $this->belongsTo(User::class);
    }
}