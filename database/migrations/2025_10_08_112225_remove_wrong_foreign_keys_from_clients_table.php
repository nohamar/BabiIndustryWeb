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
        Schema::table('clients', function (Blueprint $table) {
           
             $table->dropForeign(['service_id']);
        $table->dropColumn('service_id');

        $table->dropForeign(['feedback_id']);
        $table->dropColumn('feedback_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
             $table->unsignedBigInteger('feedback_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();

            // Restore the foreign key relationships
            $table->foreign('feedback_id')
                  ->references('id')->on('feedbacks')
                  ->onDelete('cascade');

            $table->foreign('service_id')
                  ->references('id')->on('service_orders')
                  ->onDelete('cascade');
        });
    }
};
