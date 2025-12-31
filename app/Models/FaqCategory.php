<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class FaqCategory extends Model
{
    protected $fillable = [
        'name',
        'order',
    ];

    public function faqs()
    {
        // relation is one-to-many: one category has many FAQs
        return $this->hasMany(Faq::class);
    }
}
