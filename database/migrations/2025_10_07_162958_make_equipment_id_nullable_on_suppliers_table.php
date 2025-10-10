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
        Schema::table('suppliers', function (Blueprint $table) {
             $table->unsignedBigInteger('equipment_id')->nullable()->change();
        });

         Schema::table('suppliers', function (Blueprint $table) {
            $table->dropForeign(['equipment_id']); // drop if existed
            $table->foreign('equipment_id')
                  ->references('id')
                  ->on('equipments')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropForeign(['equipment_id']); // drop if existed
            $table->foreign('equipment_id')
                  ->references('id')
                  ->on('equipments')
                  ->nullOnDelete();
        });
    }
};
