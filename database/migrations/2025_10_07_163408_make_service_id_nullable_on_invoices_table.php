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
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('service_id')->nullable()->change();

        });
         Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['service_id']); // drop if existed
            $table->foreign('service_id')
                  ->references('id')
                  ->on('service_orders')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['service_id']);
            $table->unsignedBigInteger('service_id')->nullable(false)->change();
            $table->foreign('service_id')
                  ->references('id')
                  ->on('service_orders')
                  ->cascadeOnDelete();
        });
    }
};
