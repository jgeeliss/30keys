<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keyboard_language_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keyboard_id')->constrained()->onDelete('cascade');
            $table->foreignId('language_tag_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            // Prevent duplicate tag assignments
            $table->unique(['keyboard_id', 'language_tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keyboard_language_tag');
    }
};
