<?php

namespace Database\Seeders;

use App\Models\LanguageTag;
use Illuminate\Database\Seeder;

class LanguageTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languageTags = [
            ['name' => 'English'],
            ['name' => 'Spanish'],
            ['name' => 'French'],
            ['name' => 'German'],
            ['name' => 'Italian'],
            ['name' => 'Portuguese'],
            ['name' => 'Dutch'],
            ['name' => 'Danish'],
            ['name' => 'Finnish'],
            ['name' => 'Norwegian'],
            ['name' => 'Swedish'],
            ['name' => 'Czech'],
            ['name' => 'Slovak'],
            ['name' => 'Polish'],
        ];

        foreach ($languageTags as $tag) {
            LanguageTag::create($tag);
        }
    }
}
