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
        Schema::create('job_type_foreigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('job_pages')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('job_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_type_foreigns');
    }
};
