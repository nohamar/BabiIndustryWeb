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
         Schema::table('service_orders', function (Blueprint $table) {
             $table->unsignedBigInteger('equipmentId')->nullable()->change();
        });

         Schema::table('service_orders', function (Blueprint $table) {
            $table->dropForeign(['equipmentId']); // drop if existed
            $table->foreign('equipmentId')
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
       Schema::table('service_orders', function (Blueprint $table) {
            $table->dropForeign(['equipmentId']); // drop if existed
            $table->foreign('equipmentId')
                  ->references('id')
                  ->on('equipments')
                  ->nullOnDelete();
        });
    }
};
