<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'faq_category_id',
        'question',
        'answer',
    ];

    public function category()
    {
        // relation many-to-one: many FAQs belong to one category
        return $this->belongsTo(FaqCategory::class, 'faq_category_id');
    }
}
