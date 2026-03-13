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
        Schema::create('internship_batches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('internship_session_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title')->comment('Batch title');
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internship_batches');
    }
};
