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
        Schema::table('equipments', function (Blueprint $table) {
              $table->dropForeign(['maintenance_id']);
        $table->dropColumn('maintenance_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->unsignedBigInteger('maintenance_id')->nullable();

             $table->foreign('maintenance_id')
                  ->references('id')->on('maintenace_schedules')
                  ->onDelete('cascade');

        });
    }
};
