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
        Schema::table('maintenance_schedules', function (Blueprint $table) {
              $table->unsignedBigInteger('equipment_id');
             $table->foreign('equipment_id')
                  ->references('id')->on('equipments')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('maintenance_schedules', function (Blueprint $table) {
             $table->dropForeign(['equipment_id']);
        $table->dropColumn('equipment_id');
        });
    }
};
