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
            $table->unsignedBigInteger('feedback_id')->nullable()->change();

        });

         Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['feedback_id']); // drop if existed
            $table->foreign('feedback_id')
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
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['feedback_id']);
            $table->unsignedBigInteger('feedback_id')->nullable(false)->change();
            $table->foreign('feedback_id')
                  ->references('id')
                  ->on('feedback')
                  ->cascadeOnDelete();
        });
    }
};
