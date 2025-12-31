<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'keyboard_id',
        'comment',
    ];

    public function user()
    {
        // relation many-to-one: many comments belong to one user
        return $this->belongsTo(User::class);
    }

    public function keyboard()
    {
        // relation many-to-one: many comments belong to one keyboard
        return $this->belongsTo(Keyboard::class);
    }
}
