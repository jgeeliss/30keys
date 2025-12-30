<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageTag extends Model
{
    protected $table = 'language_tags';

    protected $fillable = [
        'name',
    ];

    public function keyboards()
    {
        // Many-to-many relationship: a language tag can belong to many keyboards
        return $this->belongsToMany(Keyboard::class, 'keyboard_language_tag');
    }
}
