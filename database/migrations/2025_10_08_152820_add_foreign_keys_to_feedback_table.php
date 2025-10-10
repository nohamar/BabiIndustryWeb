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
        Schema::table('feedback', function (Blueprint $table) {
             $table->unsignedBigInteger('client_id');
             $table->foreign('client_id')
                  ->references('id')->on('clients')
                  ->onDelete('cascade');


        });

         Schema::table('feedback', function (Blueprint $table) {
             $table->unsignedBigInteger('service_id');
             $table->foreign('service_id')
                  ->references('id')->on('service_orders')
                  ->onDelete('cascade');

                  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('feedback', function (Blueprint $table) {
             $table->dropForeign(['client_id']);
        $table->dropColumn('client_id');

         $table->dropForeign(['service_id']);
        $table->dropColumn('service_id');
        });
    }
};
