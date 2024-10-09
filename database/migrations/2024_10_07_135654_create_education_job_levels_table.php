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
        Schema::create('education_job_levels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('education_id')->constrained('education')->onDelete('cascade');
            $table->foreignId('job_id')->constrained('job_pages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_job_levels');
    }
};
