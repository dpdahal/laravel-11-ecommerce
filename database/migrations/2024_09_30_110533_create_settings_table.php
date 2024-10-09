<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->longText('description')->nullable();
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->text('google_map')->nullable();

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
