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
        Schema::table('interns', function (Blueprint $table) {
            $table->string('id_card_number')->after('matricule')->nullable();
            $table->string('salutation')->after('id_card_number')->nullable();
            $table->date('date_of_birth')->after('end_date')->nullable();
            $table->string('level')->after('department')->nullable();
            $table->string('language')->after('date_of_birth')->nullable();
            $table->longText('other_information')->after('language')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('interns', function (Blueprint $table) {
            $table->dropColumn([
                'id_card_number',
                'salutation',
                'date_of_birth',
                'level',
                'language',
                'other_information',
            ]);
        });
    }
};
