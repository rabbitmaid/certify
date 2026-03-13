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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->uuid('reference')->unique();
            $table->foreignId('submission_id')->constrained('certificate_submissions')->nullable();
            $table->foreignId('generator')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('recipient')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->longText('file_path');
            $table->string('status')->default('generated');
            $table->json('data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
