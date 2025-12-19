<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'question' => 'What is 30keys?',
            'answer' => '30keys is a platform dedicated to exploring and sharing information about various keyboard layouts, typing techniques, and related topics.',
        ]);
        Faq::create([
            'question' => 'How can I contribute to 30keys?',
            'answer' => 'You can contribute by submitting new keyboard layouts, writing reviews, sharing typing tips, and participating in community discussions.',
        ]);
        Faq::create([
            'question' => 'Is 30keys free to use?',
            'answer' => 'Yes, 30keys is completely free to use for all users.',
        ]);
        Faq::create([
            'question' => 'Can I suggest new features for 30keys?',
            'answer' => 'Absolutely! We welcome feedback and suggestions from our community. You can contact us through the feedback form on our website.',
        ]);
    }
}
