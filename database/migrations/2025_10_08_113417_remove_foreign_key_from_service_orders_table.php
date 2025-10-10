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
             $table->dropForeign(['equipmentId']);
        $table->dropColumn('equipmentId');

        $table->dropForeign(['feedbackId']);
        $table->dropColumn('feedbackId');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_orders', function (Blueprint $table) {
              $table->unsignedBigInteger('feedbackId')->nullable();
            $table->unsignedBigInteger('equipmentId')->nullable();

            // Restore the foreign key relationships
            $table->foreign('feedbackId')
                  ->references('id')->on('feedbacks')
                  ->onDelete('cascade');

            $table->foreign('equipmentId')
                  ->references('id')->on('equipments')
                  ->onDelete('cascade');
        });
    }
};
