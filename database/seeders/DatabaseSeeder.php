<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Language Tags first (needed by KeyboardLayoutSeeder)
        $this->call(LanguageTagSeeder::class);
        // Seed some famous keyboard layouts with their creators
        $this->call(KeyboardLayoutSeeder::class);
        // Seed an admin user
        $this->call(AdminUserSeeder::class);
        // Seed news items
        $this->call(NewsitemSeeder::class);
        // Seed FAQ categories
        $this->call(FaqCategorySeeder::class);
        // Seed FAQs
        $this->call(FaqSeeder::class);
    }
}
