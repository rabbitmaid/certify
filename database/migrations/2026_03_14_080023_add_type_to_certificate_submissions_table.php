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
        Schema::table('certificate_submissions', function (Blueprint $table) {
            $table->string('type')->nullable()->after('id')->default('batch')->comment('individual, batch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('certificate_submissions', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
