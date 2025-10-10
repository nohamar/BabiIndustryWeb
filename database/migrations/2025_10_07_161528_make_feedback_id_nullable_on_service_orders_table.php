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
             $table->unsignedBigInteger('feedbackId')->nullable()->change();
        });

         Schema::table('service_orders', function (Blueprint $table) {
            $table->dropForeign(['feedbackId']); // drop if existed
            $table->foreign('feedbackId')
                  ->references('id')
                  ->on('feedback')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_orders', function (Blueprint $table) {
            $table->dropForeign(['feedbackId']);
            $table->unsignedBigInteger('feedbackId')->nullable(false)->change();
            $table->foreign('feedbackId')
                  ->references('id')
                  ->on('feedback')
                  ->cascadeOnDelete();
        });
    }
};
